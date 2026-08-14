<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuctionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MY AUCTIONS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $auctions = Auction::query()
            ->where('user_id', auth()->id())
            ->with([
                'category',
                'images',
                'winner',
            ])
            ->withCount('bids')
            ->latest()
            ->get();

        return view(
            'seller.auctions.index',
            compact('auctions')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE AUCTION FORM
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $categories = Category::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view(
            'seller.auctions.create',
            compact('categories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE NEW AUCTION
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
                    ->where(
                        fn ($query) =>
                            $query->where(
                                'is_active',
                                true
                            )
                    ),
            ],

            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
                'min:20',
                'max:5000',
            ],

            'starting_price' => [
                'required',
                'numeric',
                'min:1',
                'decimal:0,2',
            ],

            'bid_increment' => [
                'required',
                'numeric',
                'min:1',
                'decimal:0,2',
            ],

            'start_time' => [
                'required',
                'date',
                'after:now',
            ],

            'end_time' => [
                'required',
                'date',
                'after:start_time',
            ],

            'images' => [
                'required',
                'array',
                'min:1',
                'max:5',
            ],

            'images.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | CREATE AUCTION
        |--------------------------------------------------------------------------
        */

        $auction = Auction::create([

            'user_id' =>
                auth()->id(),

            'category_id' =>
                $validated['category_id'],

            'title' =>
                $validated['title'],

            'slug' =>
                $this->generateUniqueSlug(
                    $validated['title']
                ),

            'description' =>
                $validated['description'],

            'starting_price' =>
                $validated['starting_price'],

            'current_price' =>
                $validated['starting_price'],

            'bid_increment' =>
                $validated['bid_increment'],

            'start_time' =>
                $validated['start_time'],

            'end_time' =>
                $validated['end_time'],

            'status' =>
                'pending',

            'winner_id' =>
                null,

            'closed_at' =>
                null,

            'rejection_reason' =>
                null,
        ]);


        /*
        |--------------------------------------------------------------------------
        | STORE IMAGES
        |--------------------------------------------------------------------------
        */

        foreach (
            $request->file('images')
            as $index => $image
        ) {

            $path = $image->store(
                'auctions',
                'public'
            );


            $auction->images()->create([

                'image_path' =>
                    $path,

                'is_primary' =>
                    $index === 0,

                'sort_order' =>
                    $index,
            ]);
        }


        return redirect()
            ->route(
                'seller.auctions.index'
            )
            ->with(
                'success',
                'Auction submitted successfully and is waiting for admin approval.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT AUCTION
    |--------------------------------------------------------------------------
    */

    public function edit(Auction $auction)
    {
        /*
        |--------------------------------------------------------------------------
        | SECURITY: OWNERSHIP CHECK
        |--------------------------------------------------------------------------
        */

        $this->ensureOwnership(
            $auction
        );


        /*
        |--------------------------------------------------------------------------
        | STATUS CHECK
        |--------------------------------------------------------------------------
        |
        | Active / scheduled / ended auction
        | cannot be edited.
        |
        */

        $this->ensureEditable(
            $auction
        );


        /*
        |--------------------------------------------------------------------------
        | CATEGORIES
        |--------------------------------------------------------------------------
        */

        $categories = Category::query()
            ->where(
                function ($query) use ($auction) {

                    $query
                        ->where(
                            'is_active',
                            true
                        )
                        ->orWhere(
                            'id',
                            $auction->category_id
                        );
                }
            )
            ->orderBy('name')
            ->get();


        $auction->load('images');


        return view(
            'seller.auctions.edit',
            compact(
                'auction',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE AUCTION
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Auction $auction
    ) {
        /*
        |--------------------------------------------------------------------------
        | OWNERSHIP SECURITY
        |--------------------------------------------------------------------------
        */

        $this->ensureOwnership(
            $auction
        );


        /*
        |--------------------------------------------------------------------------
        | STATUS SECURITY
        |--------------------------------------------------------------------------
        */

        $this->ensureEditable(
            $auction
        );


        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'category_id' => [
                'required',
                'integer',

                function (
                    $attribute,
                    $value,
                    $fail
                ) use ($auction) {

                    $category =
                        Category::find($value);


                    if (!$category) {

                        $fail(
                            'The selected category is invalid.'
                        );

                        return;
                    }


                    /*
                     * Allow current category,
                     * even if admin recently disabled it.
                     */
                    if (
                        !$category->is_active
                        &&
                        (int) $category->id
                        !==
                        (int) $auction->category_id
                    ) {

                        $fail(
                            'The selected category is currently inactive.'
                        );
                    }
                },
            ],

            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
                'min:20',
                'max:5000',
            ],

            'starting_price' => [
                'required',
                'numeric',
                'min:1',
                'decimal:0,2',
            ],

            'bid_increment' => [
                'required',
                'numeric',
                'min:1',
                'decimal:0,2',
            ],

            'start_time' => [
                'required',
                'date',
                'after:now',
            ],

            'end_time' => [
                'required',
                'date',
                'after:start_time',
            ],

            /*
             * Replacement images are optional.
             */
            'images' => [
                'nullable',
                'array',
                'min:1',
                'max:5',
            ],

            'images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE BASIC DETAILS
        |--------------------------------------------------------------------------
        */

        $auction->update([

            'category_id' =>
                $validated['category_id'],

            'title' =>
                $validated['title'],

            'slug' =>
                $this->generateUniqueSlug(
                    $validated['title'],
                    $auction->id
                ),

            'description' =>
                $validated['description'],

            'starting_price' =>
                $validated['starting_price'],

            /*
             * Pending/rejected auctions
             * don't contain valid live bids.
             */
            'current_price' =>
                $validated['starting_price'],

            'bid_increment' =>
                $validated['bid_increment'],

            'start_time' =>
                $validated['start_time'],

            'end_time' =>
                $validated['end_time'],

            'winner_id' =>
                null,

            'closed_at' =>
                null,
        ]);


        /*
        |--------------------------------------------------------------------------
        | REPLACE IMAGES ONLY IF NEW IMAGES PROVIDED
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('images')) {

            $auction->load('images');


            /*
             * Delete old image files.
             */
            foreach (
                $auction->images
                as $oldImage
            ) {

                Storage::disk('public')
                    ->delete(
                        $oldImage->image_path
                    );
            }


            /*
             * Delete old DB image records.
             */
            $auction
                ->images()
                ->delete();


            /*
             * Store new images.
             */
            foreach (
                $request->file('images')
                as $index => $image
            ) {

                $path =
                    $image->store(
                        'auctions',
                        'public'
                    );


                $auction
                    ->images()
                    ->create([

                        'image_path' =>
                            $path,

                        'is_primary' =>
                            $index === 0,

                        'sort_order' =>
                            $index,
                    ]);
            }
        }


        return redirect()
            ->route(
                'seller.auctions.index'
            )
            ->with(
                'success',
                'Auction updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | RESUBMIT REJECTED AUCTION
    |--------------------------------------------------------------------------
    */

    public function resubmit(
        Auction $auction
    ) {
        /*
        |--------------------------------------------------------------------------
        | SECURITY: OWNERSHIP
        |--------------------------------------------------------------------------
        */

        $this->ensureOwnership(
            $auction
        );


        /*
        |--------------------------------------------------------------------------
        | MUST BE REJECTED
        |--------------------------------------------------------------------------
        */

        if (
            $auction->status
            !== 'rejected'
        ) {

            abort(
                403,
                'Only rejected auctions can be resubmitted.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CATEGORY MUST STILL BE ACTIVE
        |--------------------------------------------------------------------------
        */

        $category =
            Category::find(
                $auction->category_id
            );


        if (
            !$category
            ||
            !$category->is_active
        ) {

            throw ValidationException::withMessages([

                'category_id' =>
                    'Please edit the auction and select an active category before resubmitting.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | IMAGE CHECK
        |--------------------------------------------------------------------------
        */

        if (
            !$auction
                ->images()
                ->exists()
        ) {

            throw ValidationException::withMessages([

                'images' =>
                    'The auction must contain at least one image before resubmission.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | START TIME MUST BE FUTURE
        |--------------------------------------------------------------------------
        */

        if (
            !$auction->start_time
            ||
            $auction
                ->start_time
                ->lte(now())
        ) {

            throw ValidationException::withMessages([

                'start_time' =>
                    'Please edit the auction and choose a future start time before resubmitting.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | END TIME MUST BE AFTER START
        |--------------------------------------------------------------------------
        */

        if (
            !$auction->end_time
            ||
            $auction
                ->end_time
                ->lte(
                    $auction->start_time
                )
        ) {

            throw ValidationException::withMessages([

                'end_time' =>
                    'The auction end time must be after the start time.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | RESUBMIT
        |--------------------------------------------------------------------------
        */

        $auction->update([

            'status' =>
                'pending',

            'rejection_reason' =>
                null,

            'winner_id' =>
                null,

            'closed_at' =>
                null,

            'current_price' =>
                $auction->starting_price,
        ]);


        return redirect()
            ->route(
                'seller.auctions.index'
            )
            ->with(
                'success',
                'Auction resubmitted for admin approval.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE AUCTION
    |--------------------------------------------------------------------------
    */

    public function destroy(
        Auction $auction
    ) {
        /*
        |--------------------------------------------------------------------------
        | SECURITY: OWNERSHIP
        |--------------------------------------------------------------------------
        */

        $this->ensureOwnership(
            $auction
        );


        /*
        |--------------------------------------------------------------------------
        | STATUS SECURITY
        |--------------------------------------------------------------------------
        |
        | Seller must never delete:
        |
        | scheduled
        | active
        | ended
        |
        */

        if (
            !in_array(
                $auction->status,
                [
                    'pending',
                    'rejected',
                ],
                true
            )
        ) {

            abort(
                403,
                'This auction can no longer be deleted.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | DELETE IMAGES
        |--------------------------------------------------------------------------
        */

        $auction->load('images');


        foreach (
            $auction->images
            as $image
        ) {

            Storage::disk('public')
                ->delete(
                    $image->image_path
                );
        }


        /*
         * Related auction image records
         * should be removed by FK cascade,
         * but deleting explicitly keeps
         * the intent clear.
         */
        $auction
            ->images()
            ->delete();


        /*
        |--------------------------------------------------------------------------
        | DELETE AUCTION
        |--------------------------------------------------------------------------
        */

        $auction->delete();


        return redirect()
            ->route(
                'seller.auctions.index'
            )
            ->with(
                'success',
                'Auction deleted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | SECURITY HELPER: OWNERSHIP
    |--------------------------------------------------------------------------
    |
    | IMPORTANT:
    |
    | Route middleware only confirms
    | the user is a Seller.
    |
    | This check confirms the auction
    | actually belongs to THAT seller.
    |
    */

    private function ensureOwnership(
        Auction $auction
    ): void {

        if (
            (int) $auction->user_id
            !==
            (int) auth()->id()
        ) {

            abort(
                403,
                'You are not authorized to manage this auction.'
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | SECURITY HELPER: EDITABLE STATUS
    |--------------------------------------------------------------------------
    */

    private function ensureEditable(
        Auction $auction
    ): void {

        if (
            !in_array(
                $auction->status,
                [
                    'pending',
                    'rejected',
                ],
                true
            )
        ) {

            abort(
                403,
                'Only pending or rejected auctions can be edited.'
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | UNIQUE SLUG
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug(
        string $title,
        ?int $ignoreAuctionId = null
    ): string {

        $baseSlug =
            Str::slug($title);


        if ($baseSlug === '') {

            $baseSlug =
                'auction';
        }


        $slug =
            $baseSlug;


        $number =
            1;


        while (
            Auction::query()
                ->where(
                    'slug',
                    $slug
                )
                ->when(
                    $ignoreAuctionId,
                    function (
                        $query
                    ) use (
                        $ignoreAuctionId
                    ) {

                        $query->where(
                            'id',
                            '!=',
                            $ignoreAuctionId
                        );
                    }
                )
                ->exists()
        ) {

            $slug =
                $baseSlug
                .
                '-'
                .
                $number;

            $number++;
        }


        return $slug;
    }
}
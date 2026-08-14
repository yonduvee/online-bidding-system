<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Show all categories.
     */
    public function index()
    {
        $categories = Category::withCount('auctions')
            ->latest()
            ->get();

        return view(
            'admin.categories.index',
            compact('categories')
        );
    }


    /**
     * Show category creation form.
     */
    public function create()
    {
        return view('admin.categories.create');
    }


    /**
     * Store new category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:categories,name',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        Category::create([
            'name' => $validated['name'],

            'slug' => $this->generateUniqueSlug(
                $validated['name']
            ),

            'description' =>
                $validated['description'] ?? null,

            'is_active' => true,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category created successfully.'
            );
    }


    /**
     * Show edit form.
     */
    public function edit(Category $category)
    {
        return view(
            'admin.categories.edit',
            compact('category')
        );
    }


    /**
     * Update category.
     */
    public function update(
        Request $request,
        Category $category
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',

                Rule::unique(
                    'categories',
                    'name'
                )->ignore($category->id),
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $slug = $category->slug;

        /*
         * Generate a new slug only
         * if category name changed.
         */
        if ($category->name !== $validated['name']) {

            $slug = $this->generateUniqueSlug(
                $validated['name'],
                $category->id
            );
        }

        $category->update([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' =>
                $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category updated successfully.'
            );
    }


    /**
     * Activate / Deactivate category.
     */
    public function toggleStatus(Category $category)
    {
        $category->update([
            'is_active' => !$category->is_active,
        ]);

        $message = $category->is_active
            ? 'Category activated successfully.'
            : 'Category deactivated successfully.';

        return back()->with(
            'success',
            $message
        );
    }


    /**
     * Delete category.
     */
    public function destroy(Category $category)
    {
        /*
         * Do not delete categories
         * already used by auctions.
         */
        if ($category->auctions()->exists()) {

            return back()->with(
                'error',
                'This category cannot be deleted because auctions are using it. You can deactivate it instead.'
            );
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category deleted successfully.'
            );
    }


    /**
     * Generate unique category slug.
     */
    private function generateUniqueSlug(
        string $name,
        ?int $ignoreId = null
    ): string {

        $baseSlug = Str::slug($name);

        if ($baseSlug === '') {
            $baseSlug = 'category';
        }

        $slug = $baseSlug;
        $counter = 1;

        while (
            Category::where('slug', $slug)
                ->when(
                    $ignoreId,
                    function ($query) use ($ignoreId) {
                        $query->where(
                            'id',
                            '!=',
                            $ignoreId
                        );
                    }
                )
                ->exists()
        ) {
            $slug =
                $baseSlug . '-' . $counter;

            $counter++;
        }

        return $slug;
    }
}
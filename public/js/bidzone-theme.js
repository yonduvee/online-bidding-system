/*
|--------------------------------------------------------------------------
| BIDZONE DARK / LIGHT THEME
|--------------------------------------------------------------------------
|
| Default theme = Dark
| User selection = localStorage
|
*/


(function () {

    const savedTheme =
        localStorage.getItem(
            'bidzone-theme'
        );


    /*
    |--------------------------------------------------------------------------
    | APPLY SAVED THEME
    |--------------------------------------------------------------------------
    */

    if (
        savedTheme === 'light'
    ) {

        document
            .documentElement
            .setAttribute(
                'data-theme',
                'light'
            );

    } else {

        document
            .documentElement
            .setAttribute(
                'data-theme',
                'dark'
            );

    }

})();


/*
|--------------------------------------------------------------------------
| TOGGLE THEME
|--------------------------------------------------------------------------
*/

function toggleBidZoneTheme() {

    const html =
        document.documentElement;


    const currentTheme =
        html.getAttribute(
            'data-theme'
        );


    const newTheme =
        currentTheme === 'light'
            ? 'dark'
            : 'light';


    /*
     * Apply theme
     */

    html.setAttribute(
        'data-theme',
        newTheme
    );


    /*
     * Save user preference
     */

    localStorage.setItem(
        'bidzone-theme',
        newTheme
    );


    /*
     * Update theme icons
     */

    updateBidZoneThemeIcons();

}


/*
|--------------------------------------------------------------------------
| UPDATE ICON
|--------------------------------------------------------------------------
*/

function updateBidZoneThemeIcons() {

    const currentTheme =
        document
            .documentElement
            .getAttribute(
                'data-theme'
            );


    const icons =
        document.querySelectorAll(
            '.bidzone-theme-icon'
        );


    icons.forEach(
        function (icon) {

            if (
                currentTheme === 'light'
            ) {

                icon.className =
                    'fa-solid fa-moon bidzone-theme-icon';

            } else {

                icon.className =
                    'fa-solid fa-sun bidzone-theme-icon';

            }

        }
    );

}


/*
|--------------------------------------------------------------------------
| PAGE LOAD
|--------------------------------------------------------------------------
*/

document.addEventListener(
    'DOMContentLoaded',
    function () {

        updateBidZoneThemeIcons();

    }
);
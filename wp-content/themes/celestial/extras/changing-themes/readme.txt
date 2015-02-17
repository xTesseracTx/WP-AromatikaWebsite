*** Changing Themes ***

In theory, shortcodes are nice, but so are html snippets of code (mini templates) for your posts and page content. However, when a person changes themes at some point, guess what will happen with the shortcodes that were used in the actual content of your posts and pages? You will lose your styles and layout, not to mention some weird code will now be seen in your pages.

The reason this happens is because shortcodes are generally coded directly into a theme, so when you change themes, well you lose the styling that was with it because now you are using a new theme from someone else (hopefully not). 

It's not a perfect world and there will never be a perfect solution on how to maintain shortcodes and other nice page elements when you change themes, but there is a way to minimize the amount of work to clean up and edit page elements should you change themes.

Right now, because this theme has page elements such as progress bars, focus boxes, and other things, but I kept the styling out of the main theme's stylesheet and used their own separate stylesheet.

In the original download of this theme, in the "extras" folder is another folder called "css". There are two files:

1. st_responsive.css
2. st_extras.css

The st_responsive.css is a file that has some of the Bootstrap framework styling for creating responsive content using a few containers and spans. This should maintain the styling for things like image lists, content columns (sometimes called inline columns), and a few other things. 

If you change to a new theme that is not using Twitter's Bootstrap framework, then you can copy the responsive.css to your new theme's root directory (folder) where its style.css is, then link to the st_responsive.css. Your other option is to copy the css from the st_responsive.css file and paste it at the bottom of your new theme's style.css file.

You will be doing the same for the st_extras.css file as well because this is the one that contains the styling for in-page elements such as the progress bars, focus boxes, dropcaps, list styles, etc.


**** IMPORTANT *****

Before making changes to your new theme with styling from this theme, make sure you always keep a backup in case something doesn't go well. Always best to play safe with backups.

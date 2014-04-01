Coding Style Guidelines
=======================
This is the first project I'm making that will enforce specific style guidelines, and because of that, even I might be sloppy. Feel free to correct anywhere that I forget to stick to my own style!

Curly Braces and Indentation
----------------------------
One of the main reasons I built this framework was so that I could control how the whitespace was managed in the output HTML. I have no idea why, but I'm incredibly picky about whitespace use; this extends into the behind-the-scenes code as well.

### Curly Brace Location
For the most part, we'll be using Linux conventions. Things that can contain other things of the same type (for, while, if, and so forth statements) will put the beginning brace on the same line as the declaration or condition. For example:

    if ($blah) {
    	doCode();
    }

However: if it cannot contain more of the same thing, is an item at the top level of the document (not nested in anything else), or is of such extreme importance that you need to make it absolutely clear that the contained block of code is separate from everything else around it, you should put the beginning brace on the next line, with no additional indentation (with the code within the block indented, but not the brace). Example:

    function blah()
    {
    	moreCode();
    }

The ending curly brace should always go on its own line, except in the case of ifelse and else statements, or any other series of blocks that belong together as a single logical unit. Final example:

    if ($blah) {
    	stuff();
    } elseif ($blorg) {
    	moreStuff();
    } else {
    	bleegle();
    }

### Indentation
Indentation will be done with tabs. If you have a scenario where you want to line things up nicely within a single statement but across multiple lines, like:

    function blorg()
    {
    	while ($var1 == 'blah' ||
    	       $var2 != 'blorg' ||
    	       $var3 > 5) {
    		otherCode();
    	}
    }

Then you use tabs up to the 'main' indentation level for that statement (in the above, the indentation before the word 'while'), and then you use spaces to fill the rest in.

You can set your editor to use however many spaces you want for your displayed tab length, but keep in mind that I will consistently use 8 spaces per tab in my editors.

Naming
------
Most things should be in CamelCase. However, constants (even fake ones like in config.php) should be in ALL_CAPS with underscores to separate words.

### In Code
Classes should start with a capital letter. However, most other things should start with a lowercase letter.

In fact, in general, things you'll call or interact with directly (such as variables, functions, objects, and methods), even through things like '`Class::method();`' or '`object->member;`', should start with a lower case letter.

Things you interact with only indirectly in order to use objects/variables/values they contain (such as classes, abstract classes, interfaces, namespaces, or global objects/structs/whatever that just exist to contain other things you *do* directly interact with) should start with an uppercase letter.

### In Filenames
In files, the first letter should **always** be lowercase, and from there, camelCase'd.

Commenting Your Code
--------------------
I'm going to attempt to start documenting what code does, how, and why, via comments. Eventually a wiki will be started as well, but for now I just need to make sure that people reading the code understand what it's doing. To that end, I'm going to set some commenting guidelines.

In all cases, comments should **not** go over the 80 column mark in your editor. For reference, that previous sentence I wrote is exactly 80 characters wide when viewing the raw Markdown (including the \*s used to put strong emphasis on 'not' and the period at the end). It doesn't matter if a comment should be on one line, when I say a 'one-line comment' that comment might go more than one line anyway. I'll demonstrate this in an example further down.

### Logic Files
Logic files are files that contain mostly, or even only, PHP code. No HTML, no CSS, nothing but the 'business logic' of the website.

Every logic file should start with a large, stylized, C-style comment that describes the nature of the code within. The comment will look something like this:

    /******************************************************************************
     * Hello, world! This is a big comment, isn't it? Wow, look at all those      *
     * asterisks around it, too! Aren't they pretty?                              *
     *                                                                            *
     * I also really like how it doesn't go over 80 characters wide. It sure is a *
     * killer when you're trying to read code in a command line, and you can't    *
     * even read the comment properly! Pretty darn annoy'n, if ya ask me.         *
     ******************************************************************************/

If you ever find that wrapping the text to fit within both 80 columns *and* the 'frame' of asterisks around it (6 characters less; so you have wrap the text at 74 columns) causes the whole thing to have extra spaces at the end of every line (like, the longest line in the comment has 2 or more spaces between it and the \* at the 79'th column), you can shrink it down so that the longest line has only 1 space there.

In most cases, you *should* either have one class per file, or one *group* of classes per file. In the former, you should describe what the class represents in the large C-style comment.

In the latter, the large C-style comment should describe, in general, what the group of classes represent and the nature of their relationship with each other. Often, this would be one abstract class or interface, which you later extend or implement in multiple similar classes. You'd describe in your large comment the abstract concept that they all represent as a whole.

If you have more than one class, you will also have a small one-line comment above each class that explains its specific role and either how it differs from the others, compliments the others, or is used by the others. Single-line comments look like this:

    // Hello! This is a single line comment! I'm just going to make this a biiit
    // longer than it really needs to be, just to help an example I mentioned above.

One-line comments should also go above or at the end of anything you feel needs explaining. For example, if you have pre-set the values of an array, you might put each value on a new line with a single-line comment at the end of it.

In general, single-line comments go *above* the thing you're explaining when it's a group or series of things that are all related, such as a group of variable declarations or the start of a block.

Single-line comments should generally go *at the end* of anything that's already inside a group or series of related things. These should generally be much shorter, if possible. Otherwise you start doing this:

    if (1) {
    	while (2) {
    		foreach ($x as $y) {
    			for ($i = 0; i < 1000000; i--) {
    				function() {
    					printf("Hello, world!\n"); // This is
    				}                                  // just ridi-
    			}                                          // culous!
    		}
    	}
    }

Note: This is when the fact that I use 8 spaces per tab really comes into play. With 4 space tabs, that code would be well within the bounds. But with 8, it just barely makes it.

Also note: One-line comments have one space between the '`//`' and the text. In fact, C-style comments also have one space padding the content from either delimiter.

### Include Files
For the purposes of this section of this document, 'include files' are PHP files that **only** have include() or include_once() statements. These are used to more dynamically control what files are necessary for different types of pages. For example, some pages don't need to use the database, while others do. Some don't even need to handle templating (they just handle API related things like logging in/out, or perhaps they just redirect to somewhere else).

Include files will have a more-or-less one-line C-style block comment at the top, describing what sorts of pages should include/include_once the file. After that, use one-line comments above any include statement that has special instructions (for example, of the server admin needs to change one of the values to fit their environment).
# Coding Style Guidelines
This is the first project I'm making that will enforce specific style guidelines, and because of that, even I might be sloppy. Feel free to correct anywhere that I forget to stick to my own style!

## Curly Braces and Indentation
One of the main reasons I built this framework was so that I could control how the whitespace was managed in the output HTML. I have no idea why, but I'm incredibly picky about whitespace use; this extends into the behind-the-scenes code as well.

### Curly Brace Location
For the most part, we'll be using Linux conventions. Things that can contain other things of the same type (for, while, if, and so forth statements) will put the beginning brace on the same line as the declaration or condition. For example:

```PHP
if ($blah) {
	doCode();
}
```

However: if it cannot contain more of the same thing, is an item at the top level of the document (not nested in anything else), or is of such extreme importance that you need to make it absolutely clear that the contained block of code is separate from everything else around it, you should put the beginning brace on the next line, with no additional indentation (with the code within the block indented, but not the brace). Example:

```PHP
function blah()
{
	moreCode();
}
```

The ending curly brace should always go on its own line, except in the case of ifelse and else statements, or any other series of blocks that belong together as a single logical unit. Final example:

```PHP
if ($blah) {
	stuff();
} elseif ($blorg) {
	moreStuff();
} else {
	bleegle();
}
```

### Indentation
Indentation will be done with tabs. If you have a scenario where you want to line things up nicely within a single statement but across multiple lines, like:

```PHP
function blorg()
{
	while ($var1 == 'blah' ||
	       $var2 != 'blorg' ||
	       $var3 > 5) {
		otherCode();
	}
}
```

Then you use tabs up to the 'main' indentation level for that statement (in the above, the indentation before the word 'while'), and then you use spaces to fill the rest in.

You can set your editor to use however many spaces you want for your displayed tab length, but keep in mind that I will consistently use 8 spaces per tab in my editors.

## Naming
Most things should be in CamelCase. However, constants (even fake ones like in config.php) should be in ALL_CAPS with underscores to separate words.

### In Code
Classes should start with a capital letter. However, most other things should start with a lowercase letter.

In fact, in general, things you'll call or interact with directly (such as variables, functions, objects, and methods), even through things like '`Class::method();`' or '`object->member;`', should start with a lower case letter.

Things you interact with only indirectly in order to use objects/variables/values they contain (such as classes, abstract classes, interfaces, namespaces, or global objects/structs/whatever that just exist to contain other things you *do* directly interact with) should start with an uppercase letter.

### In Filenames
In files, the first letter should **always** be lowercase, and from there, the name is camelCase'd.

Folders should **always** start with an uppercase letter, and from there, the name is CamelCase'd.

## Commenting Your Code
I'm going to attempt to start documenting what code does, how, and why, via comments. Eventually a wiki will be started as well, but for now I just need to make sure that people reading the code understand what it's doing. To that end, I'm going to set some commenting guidelines.

In all cases, comments should **not** go over the 80 column mark in your editor. For reference, that previous sentence I wrote is exactly 80 characters wide when viewing the raw Markdown (including the \*s used to put strong emphasis on 'not' and the period at the end). It doesn't matter if a comment should be on one line, when I say a 'single-line comment' that comment might go more than one line anyway. I'll demonstrate this in an example further down.

### Comment Styles

#### C-Style Comments
Every file should start with a large, stylized, C-style comment that describes the nature of the code within. The comment will look something like this:

```PHP
/******************************************************************************
 * Hello, world! This is a big comment, isn't it? Wow, look at all those      *
 * asterisks around it, too! Aren't they pretty?                              *
 *                                                                            *
 * I also really like how it doesn't go over 80 characters wide. It sure is a *
 * killer when you're trying to read code in a command line, and you can't    *
 * even read the comment properly! Pretty darn annoy'n, if ya ask me.         *
 ******************************************************************************/
```

Essentially, you start typing your comment. Assuming you are typing from the beginning of the line, such as with:

```PHP
/*
The comment text that goes on and on and on and on and on and on and on and on and on and on and on...
*/
```

The slash at the beginning and end take up one space of the width each, as does each asterisk, and the minimum of 1 space padding on either side of the contained text. In total, you need to leave space for at least 6 characters after the end of the text before the 80th column. The above comment would thus wrap to:

```PHP
/*
The comment text that goes on and on and on and on and on and on and on
and on and on and on and on...
*/
```

And then the spaces and asterisks are filled in:

```PHP
/******************************************************************************
 * The comment text that goes on and on and on and on and on and on and on    *
 * and on and on and on and on...                                             *
 ******************************************************************************/
```

If you ever find that wrapping the text to fit within both 80 columns *and* the 'frame' of asterisks around it causes the whole thing to have extra spaces at the end of every line (the longest line in the comment having 2 or more spaces between it and the `*` at the 79'th column, like in the comment above), you can shrink it down so that the longest line has only 1 space there:

```PHP
/***************************************************************************
 * The comment text that goes on and on and on and on and on and on and on *
 * and on and on and on and on...                                          *
 ***************************************************************************/
```

#### Single-Line Comments
Single-line comments look like this:

```PHP
// Hello! This is a single line comment! I'm just going to make this a biiit
// longer than it really needs to be, just to help an example I mentioned above.
```

Single-line comments should go above or at the end of anything you feel needs explaining. For example, if you have pre-set the values of an array, you might put each value on a new line with a single-line comment at the end of it to explain the value.

In general, single-line comments go *above* the thing you're explaining when it's a group or series of things that are all related, such as a group of variable declarations or the start of a block.

Single-line comments *at the end* of any lines that already have code, should be avoided at all costs. If you must have them, they should generally be much shorter. Otherwise you start doing this:

```PHP
if (1) {
	while (2) {
		foreach ($x as $y) {
			for ($i = 0; i < 1000000; i--) {
				function() {
					printf("Hello, world!\n"); // This is
				}	                           // just ridi-
			}		                           // culous!
		}
	}
}
```

Note: This is when the fact that I use 8 spaces per tab really comes into play. With 4 space tabs, that code would be well within the bounds. But with 8, it just barely makes it.

It's also worth noting that tabs should be used up to the point where the most indented line is indented, and *then* spaces should be used. View the source of this document and look at the above example. There are ways to indent like this going from an unindented line to an indented line. They are somewhat messy, however, and the situation doesn't usually make sense; usually you would put your comment above the indented block instead.

Also, note that single-line comments have one space between the '`//`' and the text of the comment.

### Logic Files
Logic files are files that contain mostly, or even only, PHP code. No HTML, no CSS, nothing but the 'business logic' of the website.

In most cases, you *should* either have one class per file, or one *group* of classes per file. In the former, you should describe what the class represents in the large C-style comment.

In the latter, the large C-style comment should describe, in general, what the group of classes represent and the nature of their relationship with each other. Often, this would be one abstract class or interface, which you later extend or implement in multiple similar classes. You'd describe in your large comment the abstract concept that they all represent as a whole.

If you have more than one class, you will also have a small single-line comment above each class that explains its specific role and either how it differs from the others, compliments the others, or is used by the others.

### Include Files
For the purposes of this section of this document, 'include files' are PHP files that **only** have include() or include_once() statements. These are used to more dynamically control what files are necessary for different types of pages. For example, some pages don't need to use the database, while others do. Some don't even need to handle templating (they just handle API related things like logging in/out, or perhaps they just redirect to somewhere else).

Include files will have a C-style block comment at the top, describing what sorts of pages should include/include_once the file. After that, use single-line comments above any include statement that has special instructions (for example, of the server admin needs to change one of the values to fit their environment), and above any group of related includes.

## Tags

### PHP
The placement of PHP's start and end tags depends on how you are using the PHP. The idea is that how you use it should convey a consistent meaning across similar instances.

If your file ends with PHP code, leave off the ending tag.

#### Inline with Output
If, and **only** if you need to echo a variable inside what is otherwise *not* PHP, you should write your PHP inline with your document. This essentially means you'll have your document's code to the right of your PHP, and more to the left of your PHP.

When using inline PHP, use short PHP 'echo' tags.

In general, having as little inline code as possible will improve readability. Here's an example of PHP code inline with HTML:

```HTML+PHP
<!-- This is wrong: -->
<title><?php echo($title); ?> - My Website</title>

<!-- This is right: -->
<title><?= $title ?> - My Website</title>
```

#### Large block
Use the full '`<?php`' start tag at all other times. If this is at the top of the document, then the '`<`' character should be the very first character of the document. ***AVOID UNICODE FILES THAT USE THE BYTE-ORDER MARK.*** Such files might cause output to be sent to the buffer early, and you might have some very messy side effects, especially if you do this on one of your pages.

After the start tag, put a blank line before you start your actual PHP code. 

#### Mixed with Output
In contrast with PHP code inline with your output, sometimes you're writing code that formats and writes the output itself. While this might logically sound like the place to '`echo`' your output code, **don't**. Another thing to avoid is doing this along-side your 'business logic'. *Always keep business logic and output logic separate*.

Always put the PHP tag at the *end* of the current line. This is because we read from left to right, and as a result, we want the left side of the code to be as readable as possible. Also, having the actual PHP code on new lines helps the brain switch to the new language's context. Here's an example:

```HTML+PHP
<ul><?php
foreach (range(1, 10) as $i) { ?> 
	<li>Item <?= $i ?></li><?php
} ?> 
</ul>
```

Some important details:

Each ending tag has a space after it so that the newline that comes after it is counted. The only bad thing this causes is an extra space after some lines of your output. But this allows you to cleanly format your output with clean and sane indentation.

The PHP code is not indented any further than the output that *surrounds* it, and any output that's *inside* it is indented further. This keeps indentation clean for both the PHP and the resulting output. If you find yourself having to indent a lot before even sending *any* output, you're probably mixing 'business logic' with 'formatting logic'. Don't do that.

Of course, nested indentation levels are fine when you have output at each level, or at all levels except the top ones, with none skipped. For example, if you have to indent 5 levels, you can have output at: the first; first and second; first, second, and third; first, second, third, and fourth; and first, second, third, fourth, and fifth levels.

## HTML, Javascript, CSS...
Browser support is one of the lowest priorities. The absolute highest priority is that we need to stick with what is a defined standard. This is so that, in the future, all browsers (that are up to date) will eventually support it anyway. Browser-specific things are to be avoided wherever possible.

Minimalism is also extremely important. Keeping the amount of code down to a minimum, while still doing what we want, is key. As a matter of principle, anything sent to the client should be used by said client, with few exceptions. Such exceptions might be things like CSS rules that don't deal with a particular page (because the relevant element doesn't exist). However, the number of unused bits of code should be kept as absolutely low as possible, and should **never** be the contents of an entire file.

The goal is for maximum readability. Ideally, we'd have code readable without even syntax highlighting (for both generated and static code), but at least have readable code when only syntax highlighting (but not automatic code formatting) is available.
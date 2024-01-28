Title : "Task-1"
Date : 26/09/2023

---

## Topics Covered :

- Comments
- Declaring Variables and its scope
- Constants
- echo and print 
- Data Types

---

## Comments
: Comments are not touched by the php interpreter.
    - `//` or `#` is used for single line comments.
    - `/* */` is used for comments with more than one line.

## Variables
: Variables are the place holders for the value. Variables are declared with `$variable_name`
    - PHP is a loosely typed language and doesn't need declaration of the variable.

## Scope of the variables
:Scope referes to the part of the code where the code is accessable.
    - local -> Can be accessed only within a function.
    - global -> Can be accessed outside the function.
    - static -> this value doesn't change once run.

### Accessing a Global Variable
`$GLOBAL['var_name']` -> Used to access the value of a globally declared variable.

## constants
`define(var_name,Value,case_insensitive?)` - Used to declare a constant variable and assign it's value.

## Difference between `echo` and `print`
:`echo` or `echo()` returns nothing, comparitevly faster than print.
:`print` or `print()` takes one argument and returns `1` on successful execution.

## Data Types
- String : Sequence of character
- Integers : Numeric values without decimal
- Float : Numeric values with decimal point
- Boolean : can be either `true` or `false`
- Array : Collection of datatypes, can be mixed type as-well

`var_dump()` can be used to check the datatype of the variable by passing it as a parameter.

`NULL` can be used to unassign the value from the variable.

## String functions

- `strlen()` - Used to find the length of the string.
- `str_word_count()` - Used to count the number of words in a string.
- `strrev()` - Used to reverse a string.
- `strpos()` - Used to find the position of word/character in a string.
- `str_replace("replacement","to be replaced","Variable")` - Used to replace a word/character from a word.

# phpList addon for ExpressionEngine 3

This addon makes it easy to create AJAX phpList signup forms. Two tags are used: **{exp:willow_phplist:form}** to generate the form and **{exp:willow_phplist:script}** to generate the JavaScript for the sign up. **Requirements:** ExpressionEngine 3 and jQuery.

##Installing

Just copy the willow_phplist folder to your **/user/addons** folder and activate it in the CPanel.

##Creating the form

	{exp:willow_phplist:form}
		<input type="email" name="email">
		<input type="submit" value="Subscribe!">
	{/exp:willow_phplist:form}

The only *required* input is one named *email*. If your list has more attributes, all you need to do is add the *input* with the same name value.

**Parameters**

- **subscribe_page_id** Sets up the form to use the chosen subscribe page created on phpList. Defaults to 1.
- **subscribe_page_url**  This is the base directory of your phplist installation, most commonly used are /list or /lists. Defaults to /lists/
- **list_id** The list ID the visitor will be subscribing to.
- **form_id** Set the form id for styling (do not include #). Defaults to phplist.

##Generating the JavaScript for the form

	{exp:willow_phplist:script}

**Parameters**

- **form_id** Must match the form ID used with *{exp:willow_phplist:form}*. Defaults to phplist.
- **success_message** Use this to define the copy displayed when the visitor successfully signs up.
- **failure_message** If something goes wrong, this is displayed to let the user know the subscription was not successful.

##Styling the form

Use the form's id to style it with CSS (default is phplist).

**Example**

	#phplist input.email { padding:5px; }
	#phplist-success { color:green; }
	#phplist-failure { color:red; }

For support and more information visit [Willow Light Studio](https://willowlightstudio.com/contact)

## License

The MIT License (MIT)
Copyright (c) 2016 Willow Light Studio LLC

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
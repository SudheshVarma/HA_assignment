Introduction:
This is a Drupal 8/9 Module that has a Content Type - Attendees which will take 3 inputs - Title, Body(could be HTML and supports WUSIWYG) and File upload that takes a txt file(sample included in the module root directory as sample.txt). This content type takes the text file, extracts the data and renders that data into a Table.

Utilities:
The Module makes use of PHP File reading, Configurations, Plugin Blocks and template in twig

Project Setup:
Installing the module automatically creates the Content Type and just adding data to the node would be the functionality.

Brief Description:
The Module contains of the config files in the directory {module}/config/install which will install the Content Type: Attendees automatically. After installing the module, you can insert data to a node at '{project}/node/add/attendees'. To view your created node, simply go to 'admin/content' page and VIEW the node under this Content Type or '/node/{nid}' which takes you directly to the view node page.

Approach:
when a node is viewed, using the Hook - hook_theme() in the module file, the data is manipilated as required. A Custom block is created with all the data renderd from a current node and built a table with that data. this block is renderd over the page using a template twig file where required data is renderd into appropriate HTML tags as a Markup. The data is passed as variables and renders appropriately.

Timeline:
Estimated- 4 Hrs
Actual- 3.5 Hrs

Pending Items: Nothing

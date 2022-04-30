<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Shop Project</td></tr>
<tr><td> <em>Student: </em> Christopher Mejia(cm43)</td></tr>
<tr><td> <em>Generated: </em> 4/30/2022 2:40:30 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-3-shop-project/grade/cm43" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone3 branch </li>
<li>Create a new markdown file called milestone3.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone3.md link (from Milestone3) into the proposal.md file under each milestone3 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone3.md</li>
<li>Add/commit/push the changes to Milestone3</li>
<li>PR Milestone3 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 4</li>
<li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User will be able to purchase their cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Orders table with valid data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166093222-67701645-d778-4f5e-8ca7-c434fcf23794.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Orders table with data.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of OrderItems table with validate data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166093246-554b23de-b193-448a-99cc-a3c7785d96d3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of OrdersItems table with data.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the purchase form UI from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166093635-c32da3c1-4091-42ca-a7f4-ade26b75a4db.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of purchase form.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the purchase validation code (ensure your ucid and date are included) (Payment method, purchase value, shipping info)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166093289-20b8cf9a-17d0-4ebf-a9e3-fc8ca224f33b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>php validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166093339-88225b25-e911-4736-af1e-1bafa91f87e7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>javascript validation<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the Order Process validations from the UI (Price check, Quantity/Stock check)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166093696-c4ee8164-75c7-4cee-877b-e8d686b2f6e8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of user not able to afford cart.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166093755-5029daf1-2bc9-4ce0-95b3-53280223636d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of quantity not being available in the shop.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly describe the code flow/process of the purchase process</td></tr>
<tr><td> <em>Response:</em> <p>My code uses javascript validation before submitting the form to check that the<br>fields are all filled out and of the correct type. Once the form<br>submits it checks whether the balance entered is equal or greater than the<br>total cost of the users cart and it also checks that the quantity<br>the user wants is available.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/107">https://github.com/chrism1001/IT202-002/pull/107</a> </td></tr>
<tr><td> <em>Sub-Task 8: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/checkout_form.php">https://cm43-prod.herokuapp.com/Project/checkout_form.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Order Confirmation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot showing the order details from the purchase form and the related items that were purchased with a thank you message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166093835-d9f2a697-94f5-48f1-aac9-a475da8aa76c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of order confirmation page with thank you message.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how this information is retrieved and displayed from a code logic perspective</td></tr>
<tr><td> <em>Response:</em> <p>For the order confirmation page. First I use a query to select the<br>max id of the Orders table. This is to get the latest item<br>id. As I&#39;m typing this I could see some issues with this because<br>it gets the last id in the orders table, but if two users<br>purchase it might get the wrong id. Next I use a query to<br>select all the information from the Orders table with the max id and<br>the user id. I then get information from the Orders table and the<br>Products table to get the name, order_id, quantities etc. I then use the<br>information i get from the three tables to generate the thank you page.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/108">https://github.com/chrism1001/IT202-002/pull/108</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/confirmation_page.php">https://cm43-prod.herokuapp.com/Project/confirmation_page.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to see their Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history for a user</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166094000-a78168c6-1c21-4752-8389-1880b58981a8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of a users order history.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166094030-bd7d4571-bf4a-4b95-84bc-d218ac950f7f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of orders details page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details</td></tr>
<tr><td> <em>Response:</em> <p>For the order information pages I use a queries to select the information<br>to display from Orders and I use a Join to get information from<br>OrderItems and Products tables. With this I dynamically create the orders details page.<br></p><br><p>To display the purchase history I use a query to select information from<br>the orders table with the user&#39;s user_id. With this information, I&#39;m able to<br>generate a table of every purchase associated with the user&#39;s user id.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/109">https://github.com/chrism1001/IT202-002/pull/109</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/purchase_history.php">https://cm43-prod.herokuapp.com/Project/purchase_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history from multiple users</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166094413-b9a4d5b1-ffd6-4dd8-a7f3-6de5a82fe05c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshop of the entire shops purchase history.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page) (from a user that's not the Store Owner)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166094448-81b58346-ccd3-4917-9bc7-45fa212d2ddd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of orders details page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details (mostly how it differs from the user's purchase history feature)</td></tr>
<tr><td> <em>Response:</em> <p>For the admin shop history page I used a query to select all<br>the items from the Orders table. With this information I was easily able<br>to create a table that could display every single order that is in<br>the table with the user_ids that purchased.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/110">https://github.com/chrism1001/IT202-002/pull/110</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-dev.herokuapp.com/Project/admin/all_purchase_history.php">https://cm43-dev.herokuapp.com/Project/admin/all_purchase_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone3.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166094742-0fb4b266-0e2e-4131-a7f0-d1148bc42951.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of milestone 3 filled out in Proposal.md file.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166094828-5d71f557-7cd3-4662-aef0-1a3baf3b4683.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of closed issues for milestone 3.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/166094894-c4382404-e707-4a60-9917-c27bbc987425.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of closed issues for milestone 3.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-3-shop-project/grade/cm43" target="_blank">Grading</a></td></tr></table>
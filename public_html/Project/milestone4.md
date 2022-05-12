<table><tr><td> <em>Assignment: </em> IT202 Milestone 4 Shop Project</td></tr>
<tr><td> <em>Student: </em> Christopher Mejia(cm43)</td></tr>
<tr><td> <em>Generated: </em> 5/11/2022 10:39:51 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-4-shop-project/grade/cm43" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone4 branch </li>
<li>Create a new markdown file called milestone4.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone4.md link (from Milestone4) into the proposal.md file under each milestone4 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone4.md</li>
<li>Add/commit/push the changes to Milestone4</li>
<li>PR Milestone4 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes</li>
<li>Submit the direct link to this new milestone4.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User can set their profile to public or private </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of new column on the Users table</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167974702-a1ec3197-6c9d-41e9-84ca-84022e475dbb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of new table column for visibility.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of updated profile edit view</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167974577-b5e37042-8b21-47ec-a5b4-68a10dd50b4a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of new profile page. User can now toggle to private or public<br>profile.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of profile view view (ensure email isn't shown publicly)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167974753-6e111505-cf94-4bdc-a5ae-ab7c05addea2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of profile view.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s) links</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/123">https://github.com/chrism1001/IT202-002/pull/123</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/124">https://github.com/chrism1001/IT202-002/pull/124</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add direct link to a public profile from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/profile.php?id=25">https://cm43-prod.herokuapp.com/Project/profile.php?id=25</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic behind how public/private profile works</td></tr>
<tr><td> <em>Response:</em> <p>The users table visibility column is of tinyint values meaning that if the<br>profile has a 0 value it will private and a 1 value will<br>be public. In profile.php I added a new check to update the visibility<br>value for the user whenever they toggle the visibility toggle. Whenever another user<br>vists a profile, profile.php checks whether the visibility is public. The query checks<br>it the visibility value is greater than 1. With this check we can<br>determine whether the profile is private or not. If it is private we<br>redirect the user to another page, it is public we can see the<br>users profile.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> User will be able to rate a product they purchased </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Ratings table with some data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167975548-68915b24-9eba-46d2-939f-fd44329f8673.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of ratings table with data in it.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Product Details page with comments/ratings and the form to add another and the average rating</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167975710-79a817d5-810d-4978-aa3b-8d0b702969ce.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of products rating and the ratings form in the products details page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of the error message for a user trying to rate/comment that hasn't purchased the product</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167975832-721c5e92-37d6-47c6-9fdb-29f066343e39.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of user not being able to review a product because they have<br>not purchased it.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/133">https://github.com/chrism1001/IT202-002/pull/133</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/128">https://github.com/chrism1001/IT202-002/pull/128</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to a product details page with ratings/comments</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/product_details.php?id=3">https://cm43-prod.herokuapp.com/Project/product_details.php?id=3</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic being adding comment/rating and validations</td></tr>
<tr><td> <em>Response:</em> <p>The review form has javascript validation that checks to make sure the user<br>input a value between 0 and 5 and that the rating and comment<br>fields are not empty. In php we use a query to insert the<br>value we get from POST to insert into the ratings table with users<br>user_id and the correct product_id.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167976210-66919873-f3ac-41db-bfeb-4a15d3981445.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of a users purchase history. It has pagination that shows 5 items.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167976320-84292b29-5e65-4da0-9483-f201a2770ae0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users can sort by date purchased, payment method and total cost.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/131">https://github.com/chrism1001/IT202-002/pull/131</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/purchase_history.php">https://cm43-prod.herokuapp.com/Project/purchase_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied (ensure the calculated total price is clearly visible)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167976626-13f25e4e-038d-428d-84f2-5e7a60b6b111.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of example of shop history page with sorting.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/129">https://github.com/chrism1001/IT202-002/pull/129</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the store owner's purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-dev.herokuapp.com/Project/admin/all_purchase_history.php">https://cm43-dev.herokuapp.com/Project/admin/all_purchase_history.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the total price is calculated based on the filtered/paginated results</td></tr>
<tr><td> <em>Response:</em> <p>Was not able to finish this deliverable because I found it difficult to<br>implement and did not understand how to filter the results by date and<br>category. Similarly the purchase history page is also the same. There are no<br>filtering features for either pages only the sorting. For the sorting we use<br>_GET to get the sorting method that the user entered and the way<br>the user can sort. Like if the user wants to see the most<br>expensive order they can choose either ascending or descending. We do this in<br>java script to change the form order depending on the user input.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Add pagination to Shop and any other product lists not covered </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot(s) of the newly paginated pages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167977128-288c4bc8-a2da-41d5-bc69-1808aa2c86b0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>shop pagination of 10 items.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167977194-79d1f6c2-c09e-4db4-a0b3-27f932da6805.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>review pagination<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/127">https://github.com/chrism1001/IT202-002/pull/127</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related pages</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/product_details.php?id=2&page=3">https://cm43-prod.herokuapp.com/Project/product_details.php?id=2&page=3</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/shop.php">https://cm43-prod.herokuapp.com/Project/shop.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Store Owner will be able to see all products out of stock </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the out of stock results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167977330-9520cea9-c995-4872-a6e0-f3cd21341cad.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>store owner can filter by not only the name of products but quanity.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167977608-b3962665-2508-4056-8c2c-e379529eef5b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of my code that I used to filter by quantity.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/129/commits/3c36f21d13ad5a8805b8137244e7b8eb5048c623">https://github.com/chrism1001/IT202-002/pull/129/commits/3c36f21d13ad5a8805b8137244e7b8eb5048c623</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/admin/list_products.php">https://cm43-prod.herokuapp.com/Project/admin/list_products.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain your approach to this view</td></tr>
<tr><td> <em>Response:</em> <p>For this feature, I checked whether the user input value from _POST was<br>an integer. If it was an integer I can setup a query for<br>only the quantity and paginate the results. My query selects relevant information from<br>the Products table and checks that stock &lt;= :s. :s is bound to<br>the user input value from post. If the _POST value is not an<br>integer then it goes into the else statement and checks for only name.<br>There is an issue with this feature though because although it gets the<br>correct results from the queries, the paginated results break when I change to<br>another page. For example if I search for the letter &#39;a&#39; I get<br>the 5 results from the first page, if I go into the second<br>page the result breaks, but if I search for the same letter <code>a</code><br>I get the correct results from the paginated results in page 2. I<br>think its because of isset($_POST) check at the top of my file.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User can sort products by average rating on the shop page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing the sort in effect</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167978349-7480afb1-0498-48c0-8800-6c900ede22b6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of rating sort in the shop page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Products table (or your implementation/approach to average rating)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167978559-a0ce5e8f-d245-4f35-8738-21ede5f00be0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of ratings table.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167978676-26ddc3ab-da6c-4252-b41d-a4ffc2496a49.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of code showing avg_Rating calculated and updated whenever a user inputs a<br>new review in the product details page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/128">https://github.com/chrism1001/IT202-002/pull/128</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/shop.php?name=&col=avg_rating&order=desc">https://cm43-prod.herokuapp.com/Project/shop.php?name=&col=avg_rating&order=desc</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you implemented the average rating recording logic and how it applies to this sort on sho</td></tr>
<tr><td> <em>Response:</em> <p>For this feature I decided to add a column to product table for<br>the avg_Rating. For the avg_rating, whenever a user posts a new review, I<br>recalculate the avg_rating by selecting calculating the sum of all the reviews from<br>the ratings table plus the new review that is posted from the user<br>divided by the total count of the reviews from the ratings table plus<br>one to account for the new review. This is done by a query<br>that selects all the reviews with the products id. This value is updated<br>whenever a user updates a new review and is then displayed in the<br>shop page and the product details page. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone4.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167980865-4077a226-9fec-44fc-b6cf-973dc4077df9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of updated proposla.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone4 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167981126-3157a7cb-9f50-4b23-9b5e-cc5d53ec01a4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of completed items.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/167981178-783c5647-efe8-4579-8bc5-0f51d2843306.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of partially completed items.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-4-shop-project/grade/cm43" target="_blank">Grading</a></td></tr></table>
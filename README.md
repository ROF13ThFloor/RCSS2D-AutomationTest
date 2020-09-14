------

# continuous integration in RCSS2D 

in this project we will try to Configure Continuose Integration and Delivery pipeline for 2d soccer simulation team , this project contain 2 main test in Test stages such as : 

1.  AutoTest : in this test , for example 100 game against one team run and the results in each game contain GA , GF , ExpectedWinrate  , Winrate and some other information about game . 
2. AutotestFormation : in this test , against all formation of robocup teams we run above test and each of the test contain formation information and other execution test results in last test . 

------

# Pipeline of project 

![](/home/mojtaba/Desktop/Screenshot 2020-09-15 01:04:26.png)

we have 3 stages in this project CI Pipeline : 

1. **Build Stage : in this stage , code will be maked by shell execution .** 
2. **Test Stage : in this stage , one of the tests in prev section will be execute on the base code that compiled in prev stage .** 
3. **Deploy stage : in this stage , prev game and test results will be saved as json format  and save as artifacts gitlab repository .**

for configure the pipeline you should follow this instruction : 

1. first of all you should config your runner for your projects or config one group runner that execute all the project under your teams reopsitory . 

   ​				**a**.[install gitlab runner](https://docs.gitlab.com/runner/install/) . 

   ​				**b**.after install the runner config it with the token in your gitlab api in following path : 

   ​			

   ```
   	Setting -> ci-cd -> runners 
   ```

   ​				**c**.after register a runner for your project now you can start the test . 

2. after configure a runner we have one directory in project named **ci-deevelopement** , copy your code in our directory and set path of Autotest directory that placed in project repository in your configure runner in prev section in the .gitlab-ci.yml file .

   > **Note : dont change anything else of .yml file** 

   change just line 34 and 54 in .yml file to the relative address that placed in your runner .

3. after setting path in yml folder you know can run the Autotest on your pipe line .

4. additional you can run the Autotest Formation based on the following ins : 

   ------

   # run Auto test Formation

   This section helps you to test your code with different formations against different teams. 

   #### Usage

   1. make three directory named **Ourcode** and **Theircode** and **OurFormation** inside the **Autotestformation.sh** file .
   2. add your code into Ourcodefoulder and run it with test.sh . 
   3. add their code into Theircode dir and run it with test.sh too . 
   4. at the end add formation that we need to execute test against it . use [this](https://gitlab.com/KN2C-RCSS-2D/last-works/other-teams-formations) useful repo . 

   Note : for execute the test should write name of the test in the commit messages . 

   

------

# compare Tools 

for monitoring the staged that executed in the the prev section we designed a compare tools that monitor all of the results test together . 

scenario of this web based project is that first of all user need to select the project that wanna to compare the executed test on it . 

![Screenshot 2020-09-14 090649](/media/mojtaba/OS/Users/moshtebam/Desktop/Screenshot 2020-09-14 090649.png)

in this tools all of the 2d soccer simulation team member can maintenance and improve the idea of theirs . 

![Screenshot 2020-09-14 090705](/media/mojtaba/OS/Users/moshtebam/Desktop/Screenshot 2020-09-14 090705.png)

login page for team member designed  

![Screenshot 2020-09-14 090719](/media/mojtaba/OS/Users/moshtebam/Desktop/Screenshot 2020-09-14 090719.png)

after select the project that we need commits test results all the test executed on its project will show  

![Screenshot 2020-09-14 091136](/media/mojtaba/OS/Users/moshtebam/Desktop/Screenshot 2020-09-14 091321.png)

for compare we use Google charts and other framework such as laravel in php and jquery library in javascrips 

![Screenshot 2020-09-14 091343](/media/mojtaba/OS/Users/moshtebam/Desktop/Screenshot 2020-09-14 091343.png)

Expected winrate and winrate is very important thing in this section . 

![Screenshot 2020-09-14 091445](/media/mojtaba/OS/Users/moshtebam/Desktop/Screenshot 2020-09-14 091445.png)

in the above picture we can see compared results that we select in the prev pages 

![Screenshot 2020-09-14 091456](/media/mojtaba/OS/Users/moshtebam/Desktop/Screenshot 2020-09-14 091456.png)

###### more information and contact us : 

Mojtaba.moazen.a@gmail.com
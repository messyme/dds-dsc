  <!-- Body Section -->

  <body>
    <div class="container p-4" id="bg-template">

    <h1 class="mb-4">Talent Capability Summary</h1>
      <hr>

      <table id="no_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Timestamp</th>
            <th>NIK</th>
            <th>Name</th>
            <th>Position Type</th>
            <th>Position Level</th>
            <th>Age</th>
            <th>Total pts</th>

            <th>Descriptive</th>
            <th>Inferential</th>
            <th>Probability</th>
            <th>Time Series</th>
            <th>Calculus</th>
            <th>Linear Algebra</th>
            <th>Exploratory Data Analysis</th>
            <th>Customer</th>
            <th>Growth Hacking</th>
            <th>Marketing</th>

            <th>Product</th>
            <th>Descriptive</th>
            <th>Diagnostic</th>
            <th>Predictive</th>
            <th>Prescriptive</th>
            <th>Python</th>
            <th>R</th>
            <th>PHP</th>
            <th>NodeJS</th>
            <th>Javascript</th>

            <th>C++</th>
            <th>Shell Scripting</th>
            <th>Git</th>
            <th>Elastic Search</th>
            <th>Python/R Library</th>
            <th>Power BI</th>
            <th>Tableau</th>
            <th>Google Data Studio</th>
            <th>D3.js</th>
            <th>SQL</th>

            <th>NoSQL</th>
            <th>Hadoop</th>
            <th>Spark</th>
            <th>Classification</th>
            <th>Clustering</th>
            <th>Association</th>
            <th>Regression</th> 
            <th>Airflow</th>
            <th>Pentaho</th>
            <th>Docker/Kubernetes</th> 
            
            <th>Kafka</th>
            <th>Supervised Learning</th>
            <th>Unsupervised Learning</th>
            <th>Reinforcement Learning</th>
            <th>ANN</th>
            <th>CNN</th>
            <th>RNN</th> 
            <th>Face Recoginition</th>
            <th>Object Detection</th>
            <th>OCR</th> 

            <th>NLP</th>
            <th>Paralel Computing</th>
            <th>Edge Computing</th>
            <th>RPA</th> 
        
          </tr>
        </thead>

        <tbody>
          <?php
          $i = 1;
          foreach ($talent_capability_summary->result() as $tcs) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td class="text-uppercase"><?= $tcs->timestamp ?></td>
              <td class="text-uppercase"><?= $tcs->nik ?></td>
              <td class="text-uppercase"><?= $tcs->nama_member ?></td>
              <td class="text-uppercase"><?= $tcs->nama_posisi_type ?></td>
              <td class="text-uppercase"><?= $tcs->nama_posisi_level ?></td>
              <td class="text-uppercase"><?= $tcs->age ?></td>
              <td class="text-uppercase"><?= $tcs->total_pts ?></td>

              <td class="text-uppercase"><?= $tcs->descriptive ?></td>
              <td class="text-uppercase"><?= $tcs->inferential ?></td>
              <td class="text-uppercase"><?= $tcs->probability ?></td>
              <td class="text-uppercase"><?= $tcs->time_series ?></td>
              <td class="text-uppercase"><?= $tcs->calculus ?></td>
              <td class="text-uppercase"><?= $tcs->linear_algebra ?></td>
              <td class="text-uppercase"><?= $tcs->exploratory_data_analysis ?></td>
              <td class="text-uppercase"><?= $tcs->customer ?></td>
              <td class="text-uppercase"><?= $tcs->growth_hacking ?></td>
              <td class="text-uppercase"><?= $tcs->marketing ?></td>

              <td class="text-uppercase"><?= $tcs->product ?></td>
              <td class="text-uppercase"><?= $tcs->descriptive_analytics ?></td>
              <td class="text-uppercase"><?= $tcs->diagnostic ?></td>
              <td class="text-uppercase"><?= $tcs->predictive ?></td>
              <td class="text-uppercase"><?= $tcs->prescriptive ?></td>
              <td class="text-uppercase"><?= $tcs->python ?></td>
              <td class="text-uppercase"><?= $tcs->r ?></td>
              <td class="text-uppercase"><?= $tcs->php ?></td>
              <td class="text-uppercase"><?= $tcs->nodejs ?></td>
              <td class="text-uppercase"><?= $tcs->javascript ?></td>

              <td class="text-uppercase"><?= $tcs->c ?></td>
              <td class="text-uppercase"><?= $tcs->shell_scripting ?></td>
              <td class="text-uppercase"><?= $tcs->git ?></td>
              <td class="text-uppercase"><?= $tcs->elastic_search ?></td>
              <td class="text-uppercase"><?= $tcs->python_r_library ?></td>
              <td class="text-uppercase"><?= $tcs->power_bi ?></td>
              <td class="text-uppercase"><?= $tcs->tableau ?></td>
              <td class="text-uppercase"><?= $tcs->google_data_studio ?></td>
              <td class="text-uppercase"><?= $tcs->d3_js ?></td>
              <td class="text-uppercase"><?= $tcs->sql_sql ?></td>

              <td class="text-uppercase"><?= $tcs->nosql ?></td>
              <td class="text-uppercase"><?= $tcs->hadoop ?></td>
              <td class="text-uppercase"><?= $tcs->spark ?></td>
              <td class="text-uppercase"><?= $tcs->classification ?></td>
              <td class="text-uppercase"><?= $tcs->clustering ?></td>
              <td class="text-uppercase"><?= $tcs->association ?></td>
              <td class="text-uppercase"><?= $tcs->regression ?></td>
              <td class="text-uppercase"><?= $tcs->airflow ?></td>
              <td class="text-uppercase"><?= $tcs->pentaho ?></td>
              <td class="text-uppercase"><?= $tcs->docker_kubernetes ?></td>

              <td class="text-uppercase"><?= $tcs->kafka ?></td>
              <td class="text-uppercase"><?= $tcs->supervised ?></td>
              <td class="text-uppercase"><?= $tcs->unsupervised ?></td>
              <td class="text-uppercase"><?= $tcs->reinforcement ?></td>
              <td class="text-uppercase"><?= $tcs->ann ?></td>
              <td class="text-uppercase"><?= $tcs->cnn ?></td>
              <td class="text-uppercase"><?= $tcs->rnn ?></td>
              <td class="text-uppercase"><?= $tcs->face_recognition ?></td>
              <td class="text-uppercase"><?= $tcs->object_detection ?></td>
              <td class="text-uppercase"><?= $tcs->ocr ?></td>

              <td class="text-uppercase"><?= $tcs->nlp ?></td>
              <td class="text-uppercase"><?= $tcs->paralel_computing?></td>
              <td class="text-uppercase"><?= $tcs->edge_computing ?></td>
              <td class="text-uppercase"><?= $tcs->rpa ?></td>
            
            </tr>

          <?php
          }
          ?>
        </tbody>

        <tfoot>
          <tr>
          <th>No</th>
            <th>Timestamp</th>
            <th>NIK</th>
            <th>Name</th>
            <th>Position Type</th>
            <th>Position Level</th>
            <th>Age</th>
            <th>Total pts</th>

            <th>Descriptive</th>
            <th>Inferential</th>
            <th>Probability</th>
            <th>Time Series</th>
            <th>Calculus</th>
            <th>Linear Algebra</th>
            <th>Exploratory Data Analysis</th>
            <th>Customer</th>
            <th>Growth Hacking</th>
            <th>Marketing</th>

            <th>Product</th>
            <th>Descriptive</th>
            <th>Diagnostic</th>
            <th>Predictive</th>
            <th>Prescriptive</th>
            <th>Python</th>
            <th>R</th>
            <th>PHP</th>
            <th>NodeJS</th>
            <th>Javascript</th>

            <th>C++</th>
            <th>Shell Scripting</th>
            <th>Git</th>
            <th>Elastic Search</th>
            <th>Python/R Library</th>
            <th>Power BI</th>
            <th>Tableau</th>
            <th>Google Data Studio</th>
            <th>D3.js</th>
            <th>SQL</th>

            <th>NoSQL</th>
            <th>Hadoop</th>
            <th>Spark</th>
            <th>Classification</th>
            <th>Clustering</th>
            <th>Association</th>
            <th>Regression</th> 
            <th>Airflow</th>
            <th>Pentaho</th>
            <th>Docker/Kubernetes</th> 
            
            <th>Kafka</th>
            <th>Supervised Learning</th>
            <th>Unsupervised Learning</th>
            <th>Reinforcement Learning</th>
            <th>ANN</th>
            <th>CNN</th>
            <th>RNN</th> 
            <th>Face Recoginition</th>
            <th>Object Detection</th>
            <th>OCR</th> 

            <th>NLP</th>
            <th>Paralel Computing</th>
            <th>Edge Computing</th>
            <th>RPA</th> 
      
          </tr>
        </tfoot>
      </table>


      <br>

      <h1 class="mb-4">Minimum of Proficiency Level</h1>
      <hr>

      <table id="no_row_order_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Skill Name</th>
            <th>J1</th>
            <th>J2</th>
            <th>J3</th>
            <th>M1</th>
            <th>M2</th>
            <th>M3</th>
            <th>S1</th>
            <th>S2</th>
            <th>S3</th>
            <th>Avg. Proficiency</th>
            <th>Provisional Weight</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $i = 1;
          foreach ($minimum_proficiency_level->result() as $mp) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td class="text-uppercase"><?= $mp->name_skill ?></td>
              <td class="text-uppercase"><?= $mp->j1 ?></td>
              <td class="text-uppercase"><?= $mp->j2 ?></td>
              <td class="text-uppercase"><?= $mp->j3 ?></td>
              <td class="text-uppercase"><?= $mp->m1 ?></td>
              <td class="text-uppercase"><?= $mp->m2 ?></td>
              <td class="text-uppercase"><?= $mp->m3 ?></td>
              <td class="text-uppercase"><?= $mp->s1 ?></td>
              <td class="text-uppercase"><?= $mp->s2 ?></td>
              <td class="text-uppercase"><?= $mp->s3 ?></td>
              <td class="text-uppercase"><?= $mp->avg_proficiency ?></td>
              <td class="text-uppercase"><?= $mp->provisional_weight ?></td>
            </tr>

          <?php
          }
          ?>
        </tbody>

        <tfoot>
          <tr>
            <th>No</th>
            <th>Skill Name</th>
            <th>J1</th>
            <th>J2</th>
            <th>J3</th>
            <th>M1</th>
            <th>M2</th>
            <th>M3</th>
            <th>S1</th>
            <th>S2</th>
            <th>S3</th>
            <th>Avg. Proficiency</th>
            <th>Provisional Weight</th>
          </tr>
        </tfoot>
      </table>
    
    </div>


  </body>
  <!-- End of Body Section -->
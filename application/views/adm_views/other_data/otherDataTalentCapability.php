  <!-- Body Section -->

  <body>
    <div class="container p-4" id="bg-template">
      <h1 class="mb-4">Category Skill</h1>
      <hr>

      <?php
      if ($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
      }
      ?>

      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addCategorySkill"><em class="fas fa-plus"></em> Add Category Skill</button>

      <table id="no_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($category_skill->result() as $cs) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td class="text-uppercase"><?= $cs->name_category_skill ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editCategorySkill<?= $cs->id_category_skill ?>"><em class="fas fa-edit"></em> Edit</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategorySkill<?= $cs->id_category_skill ?>"><em class="fas fa-trash"></em> Delete</button>
                </div>
              </td>
            </tr>

          <?php
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>

      <?php
      if ($this->session->userdata('role') != 'user_logged_in') {
      ?>

        <?php
        if ($footnote_category_skill->username_admin) {
        ?>
          <div class="mt-4" id="footnote">
            <?= $footnote_category_skill->username_admin ?> successfully <?= $footnote_category_skill->activity ?> data <?= $footnote_category_skill->page ?>-<?= $footnote_category_skill->table_name ?> with name: <?= $footnote_category_skill->name ?> on <?= $footnote_category_skill->timestamp ?>
          </div>
        <?php
        }
        ?>

      <?php
      }
      ?>

      <h1 class="mb-4">Skill Type</h1>
      <hr>

      <?php
      if ($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
      }
      ?>

      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addSkillType"><em class="fas fa-plus"></em> Add Skill Type</button>

      <table id="no_row_order_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($skill_list_type->result() as $slt) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td class="text-uppercase"><?= $slt->name_skill_list_type ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editSkillType<?= $slt->id_skill_list_type ?>"><em class="fas fa-edit"></em> Edit</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteSkillType<?= $slt->id_skill_list_type ?>"><em class="fas fa-trash"></em> Delete</button>
                </div>
              </td>
            </tr>

          <?php
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>

      <?php
      if ($this->session->userdata('role') != 'user_logged_in') {
      ?>

        <?php
        if ($footnote_skill_list_type->username_admin) {
        ?>
          <div class="mt-4" id="footnote">
            <?= $footnote_skill_list_type->username_admin ?> successfully <?= $footnote_skill_list_type->activity ?> data <?= $footnote_skill_list_type->page ?>-<?= $footnote_skill_list_type->table_name ?> with name: <?= $footnote_skill_list_type->name ?> on <?= $footnote_skill_list_type->timestamp ?>
          </div>
        <?php
        }
        ?>

      <?php
      }
      ?>

      <h1 class="mb-4">Skill Requirement</h1>
      <hr>

      <?php
      if ($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
      }
      ?>

      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addSkillRequirement"><em class="fas fa-plus"></em> Add Skill Requirement</button>

      <table id="no_row_order_3" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($skill_list_require->result() as $slr) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td class="text-uppercase"><?= $slr->name_skill_list_require ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editSkillRequirement<?= $slr->id_skill_list_require ?>"><em class="fas fa-edit"></em> Edit</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteSkillRequirement<?= $slr->id_skill_list_require ?>"><em class="fas fa-trash"></em> Delete</button>
                </div>
              </td>
            </tr>

          <?php
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>

      <?php
      if ($this->session->userdata('role') != 'user_logged_in') {
      ?>

        <?php
        if ($footnote_skill_list_require->username_admin) {
        ?>
          <div class="mt-4" id="footnote">
            <?= $footnote_skill_list_require->username_admin ?> successfully <?= $footnote_skill_list_require->activity ?> data <?= $footnote_skill_list_require->page ?>-<?= $footnote_skill_list_require->table_name ?> with name: <?= $footnote_skill_list_require->name ?> on <?= $footnote_skill_list_require->timestamp ?>
          </div>
        <?php
        }
        ?>

      <?php
      }
      ?>

      <h1 class="mb-4">List of Skill</h1>
      <hr>

      <?php
      if ($this->session->flashdata('msgSkill')) {
        echo $this->session->flashdata('msgSkill');
      }
      ?>

      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addSkillList"><em class="fas fa-plus"></em> Add Skill</button>

      <table id="no_row_order_4" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Skill Name</th>
            <th>Category</th>
            <th>Skill Type</th>
            <th>Skill Require</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $i = 1;
          foreach ($skill_list->result() as $s) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td class="text-uppercase"><?= $s->name_skill ?></td>
              <td class="text-uppercase"><?= $s->name_category_skill ?></td>
              <td class="text-uppercase"><?= $s->name_skill_list_type ?></td>
              <td class="text-uppercase"><?= $s->name_skill_list_require ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editSkillList<?= $s->id_skill_list ?>"><em class="fas fa-edit"></em> Edit</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteSkillList<?= $s->id_skill_list ?>"><em class="fas fa-trash"></em> Delete</button>
                </div>
              </td>
            </tr>

          <?php
          }
          ?>
        </tbody>

        <tfoot>
          <tr>
            <th>No</th>
            <th>Skill Name</th>
            <th>Category</th>
            <th>Skill Type</th>
            <th>Skill Require</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>

      <?php
      if ($this->session->userdata('role') != 'user_logged_in') {
      ?>

        <?php
        if ($footnote_skill_list->username_admin) {
        ?>
          <div class="mt-4" id="footnote">
            <?= $footnote_skill_list->username_admin ?> successfully <?= $footnote_skill_list->activity ?> data <?= $footnote_skill_list->page ?>-<?= $footnote_skill_list->table_name ?> with name: <?= $footnote_skill_list->name ?> on <?= $footnote_skill_list->timestamp ?>
          </div>
        <?php
        }
        ?>

      <?php
      }
      ?>

      <h1 class="mb-4">List of Proficiency Level</h1>
      <hr>

      <?php
      if ($this->session->flashdata('msgProficiency_level')) {
        echo $this->session->flashdata('msgProficiency_level');
      }
      ?>

      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addProficiencylevel"><em class="fas fa-plus"></em> Add Proficiency Level</button>

      <table id="no_row_order_5" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Proficiency Level Name</th>
            <th>Value</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($proficiency_level->result() as $pro) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td class="text-uppercase"><?= $pro->name_proficiency_level ?></td>
              <td class="text-uppercase"><?= $pro->value ?></td>
              <td>

                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editproficiency_level<?= $pro->id_proficiency_level ?>"><em class="fas fa-edit"></em> Edit</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteproficiency_level<?= $pro->id_proficiency_level ?>"><em class="fas fa-trash"></em> Delete</button>
                </div>

              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Proficiency Level Name</th>
            <th>Value</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
      <?php
      if ($this->session->userdata('role') != 'admin_logged_in') {
      ?>

        <?php
        if ($footnote_proficiency_level->username_admin) {
        ?>
          <div class="mt-4" id="footnote">
            <?= $footnote_proficiency_level->username_admin ?> successfully <?= $footnote_proficiency_level->activity ?> data <?= $footnote_proficiency_level->page ?>-<?= $footnote_proficiency_level->table_name ?> with name: <?= $footnote_proficiency_level->name ?> on <?= $footnote_proficiency_level->timestamp ?>
          </div>
        <?php
        }
        ?>

      <?php
      }
      ?>

      <h1 class="mb-4">Minimum of Proficiency Level</h1>
      <hr>

      <?php
      if ($this->session->flashdata('msgMin')) {
        echo $this->session->flashdata('msgMin');
      }
      ?>

      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addMinProficiencyLevel"><em class="fas fa-plus"></em> Add Minimum Proficiency Level</button>

      <table id="no_row_order_6" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
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
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $i = 1;
          foreach ($minimum_proficiency_level->result() as $mp) {
          ?>
            <tr>
              <td>
                <?= $i++ ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->name_skill ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->j1 ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->j2 ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->j3 ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->m1 ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->m2 ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->m3 ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->s1 ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->s2 ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->s3 ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->avg_proficiency ?>
              </td>
              <td class="text-uppercase">
                <?= $mp->provisional_weight ?>
              </td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editMinProf<?= $mp->id_minimum_proficiency_level ?>"><em class="fas fa-edit"></em> Edit</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMinProf<?= $mp->id_minimum_proficiency_level ?>"><em class="fas fa-trash"></em> Delete</button>
                </div>
              </td>
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
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>

      <?php
      if ($this->session->userdata('role') != 'user_logged_in') {
      ?>

        <?php
        if ($footnote_minimum_proficiency_level->username_admin) {
        ?>
          <div class="mt-4" id="footnote">
            <?= $footnote_minimum_proficiency_level->username_admin ?> successfully <?= $footnote_minimum_proficiency_level->activity ?> data <?= $footnote_minimum_proficiency_level->page ?>-<?= $footnote_minimum_proficiency_level->table_name ?> with id: <?= $footnote_minimum_proficiency_level->name ?> on <?= $footnote_minimum_proficiency_level->timestamp ?>
          </div>
        <?php
        }
        ?>

      <?php
      }
      ?>

      <br>

      <h1 class="mb-4">Use Case Difficulty </h1>
      <hr>

      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addusecasedifficultly"><em class="fas fa-plus"></em> Add Use Case Difficulty</button>

      <table id="no_row_order_7" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Product/Use Case</th>
            <th>Industry</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $i = 1;
          foreach ($usecase_difficultly->result() as $ucd) {
          ?>
            <tr>
              <td>
                <?= $i++ ?>
              </td>
              <td class="text-uppercase">
                <?= $ucd->nama_usecase ?>
              </td>
              <td class="text-uppercase">
                <?= $ucd->industry ?>
              </td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editusecasedifficultly<?= $ucd->id_usecase ?>"><em class="fas fa-edit"></em> Edit</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteusecasedifficultly<?= $ucd->id_usecase ?>"><em class="fas fa-trash"></em> Delete</button>
                </div>
              </td>
            </tr>

          <?php
          }
          ?>
        </tbody>

        <tfoot>
          <tr>
            <th>No</th>
            <th>Product/Use Case</th>
            <th>Industry</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>

      <?php
      if ($this->session->userdata('role') != 'user_logged_in') {
      ?>

        <?php
        if ($footnote_usecase->username_admin) {
        ?>
          <div class="mt-4" id="footnote">
            <?= $footnote_usecase->username_admin ?> successfully <?= $footnote_usecase->activity ?> data <?= $footnote_usecase->page ?>-<?= $footnote_usecase->table_name ?> with id: <?= $footnote_usecase->name ?> on <?= $footnote_usecase->timestamp ?>
          </div>
        <?php
        }
        ?>

      <?php
      }
      ?>

    </div>

  </body>
  <!-- End of Body Section -->
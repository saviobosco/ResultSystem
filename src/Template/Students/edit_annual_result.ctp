<?php
$edittemplates = [
    'label' => '',
    'submitContainer' => '{{content}}'
];
$this->Form->templates($edittemplates);

?>

<?php
// including the search parameter element
echo $this->element('searchParametersSessionClassTerm');
?>

<div class="row m-t-30">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                 <h4 class="panel-title">Edit Student Annual Result </h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="profile-picture">
                            <?= $this->Html->image('student-pictures/students/photo/'.$student->photo_dir.'/'.$student->photo,['alt' => $student->id,'width' => '150px']) ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <table class="table table-bordered">
                            <tr>
                                <th><?= __('Name') ?></th>
                                <td><?= h($student->full_name) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Admission No.') ?></th>
                                <td><?= h($student->id) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Class') ?></th>
                                <td><?= h($student->class->class) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <?= $this->Form->create($student) ?>
                <fieldset>
                    <legend><?= __('Edit Student Annual Result') ?></legend>
                    <?php if (!empty($student->student_annual_results)): ?>
                        <table class="table table-bordered table-responsive " data-toggle='tooltip' title=''>
                            <tr>
                                <th><?= __('Subject') ?></th>
                                <th><?= __('First Term') ?></th>
                                <th><?= __('Second Term') ?></th>
                                <th><?= __('Third Term') ?></th>
                                <th ><?= __('Total') ?></th>
                                <th><?= __('Grade') ?></th>
                                <th><?= __('Remark') ?></th>
                            </tr>
                            <?php for ($num = 0; $num < count($student->student_annual_results); $num++ ): ?>
                                <tr>
                                    <td class="hidden"><?= $this->Form->hidden('student_annual_results.'.$num.'.student_id') ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_annual_results.'.$num.'.subject_id') ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_annual_results.'.$num.'.class_id') ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_annual_results.'.$num.'.session_id') ?></td>
                                    <td><?= h($subjects[$student['student_annual_results'][$num]['subject_id']]) ?></td>
                                    <td><?= $this->Form->input('student_annual_results.'.$num.'.first_term') ?></td>
                                    <td><?= $this->Form->input('student_annual_results.'.$num.'.second_term') ?></td>
                                    <td><?= $this->Form->input('student_annual_results.'.$num.'.third_term') ?></td>
                                    <td><?= $this->Form->input('student_annual_results.'.$num.'.total') ?></td>
                                    <td><?= $this->Form->input('student_annual_results.'.$num.'.grade') ?></td>
                                    <td><?= $this->Form->input('student_annual_results.'.$num.'.remark') ?></td>
                                </tr>
                            <?php endfor; ?>
                        </table>

                        <?= $this->Form->hidden('student_annual_positions.0.student_id',['value' => $student->id ]) ?>
                        <?= $this->Form->hidden('student_annual_positions.0.class_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?>
                        <?= $this->Form->hidden('student_annual_positions.0.session_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?>

                        <label for="student remark"> Total </label>
                        <?= $this->Form->input('student_annual_positions.0.total',['class' => 'form-control','label'=>['text'=> 'Total']])  ?>

                        <label for="student remark"> Average </label>
                        <?= $this->Form->input('student_annual_positions.0.average',['class' => 'form-control','label'=>['text'=> 'Average']])  ?>

                        <label for="student remark"> Grade </label>
                        <?= $this->Form->input('student_annual_positions.0.grade',['class' => 'form-control','label'=>['text'=> 'Grade']])  ?>

                        <label for="student remark"> Position </label>
                        <?= $this->Form->input('student_annual_positions.0.position',['class' => 'form-control','label'=>['text'=> 'Position']])  ?>

                        <?= $this->Form->hidden('student_general_remarks.0.student_id',['value' => $student->id ]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.class_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.term_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.session_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?>
                        <label for="student remark"> Form Master's Remark </label>
                        <?= $this->Form->input('student_general_remarks.0.form_master_remark',['class' => 'form-control','label'=>['text'=> 'Result Remark']])  ?>
                        <label for="student remark"> Guidance Counsellor's Remark </label>
                        <?= $this->Form->input('student_general_remarks.0.guidance_counsellor_remark',['class' => 'form-control','label'=>['text'=> 'Result Remark']])  ?>
                        <label for="student remark"> Rector's Remark </label>
                        <?= $this->Form->input('student_general_remarks.0.rector_remark',['class' => 'form-control','label'=>['text'=> 'Result Remark']])  ?>

                        <label for="result status"> Publish Status </label>
                        <?= $this->Form->input('student_publish_results.0.status',['type' => 'checkbox']) ?>
                        <?= $this->Form->hidden('student_publish_results.0.student_id',['value' => $student->id ]) ?>
                        <?= $this->Form->hidden('student_publish_results.0.class_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?>
                        <?= $this->Form->hidden('student_publish_results.0.term_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?>
                        <?= $this->Form->hidden('student_publish_results.0.session_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?>
                    <?php endif; ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>



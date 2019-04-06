# 新雨课程认领表单定制
采用 wordpress + civicrm 架构，用 caldera forms 配合 caldera-forms-civicrm 定制前端表单。
律师认领课程，表征为 civicrm 个人选择被 组织发布的活动所 **assigned** 

一个律师可以选择多个活动进行认领。报名时需要提供个人的邮箱和所选的课程。

个人的邮箱必须在网站上注册过账号。

认领后可以登录网站后台查看认领的活动。

customized php code includes two parts: form generation and processing.

For the form generation part, we use auto-population of caldera fields.

For the post-processing part, we add a function to save the person to be assigned by his chosen activity.

This repository is trying to solve this and hope this functionality can be merged to [caldera-forms-civicrm](https://github.com/mecachisenros/caldera-forms-civicrm) in the future.




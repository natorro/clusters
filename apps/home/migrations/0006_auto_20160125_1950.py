# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
        ('home', '0005_auto_20160125_1947'),
    ]

    operations = [
        migrations.AlterField(
            model_name='article',
            name='content',
            field=models.TextField(),
        ),
        migrations.AlterField(
            model_name='article',
            name='description',
            field=models.TextField(),
        ),
        migrations.AlterField(
            model_name='article',
            name='headline',
            field=models.CharField(max_length=200),
        ),
        migrations.AlterField(
            model_name='article',
            name='pub_date',
            field=models.DateField(),
        ),
    ]

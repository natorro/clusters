# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
        ('home', '0003_article'),
    ]

    operations = [
        migrations.AddField(
            model_name='article',
            name='description',
            field=models.TextField(default=''),
            preserve_default=False,
        ),
    ]

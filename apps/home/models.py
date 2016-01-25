# -*- coding: utf-8 -*-

from __future__ import unicode_literals

from django.db import models

# Create your models here.
"""
class ArticleManager(models.Manager):
    def create_article(self, title):
        article = self.create(title=title)
        # do something with the book
        return article
"""

class Article(models.Model):
    pub_date = models.DateField(verbose_name="Fecha")
    headline = models.CharField(verbose_name="Título", max_length=200)
    description = models.TextField(verbose_name="Descripción General")
    content = models.TextField(verbose_name="Contenido")

    def __str__(self):
        return self.headline.encode('utf-8')

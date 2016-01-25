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
    pub_date = models.DateField()
    headline = models.CharField(max_length=200)
    content = models.TextField()

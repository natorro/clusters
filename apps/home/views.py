from django.shortcuts import render
from .models import Article

# Create your views here.
NUM_ARTICLES_SHOWED = 2

def init(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'index.html', ctx)

def features(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'features.html', ctx)

def software(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'software.html', ctx)

def manuals(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'manuals.html', ctx)

def research(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'research.html', ctx)

def lists(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'lists.html', ctx)

def news(request, id):
    article = Article.objects.filter(id=id)
    if article:
        ctx = {'title': article[0].headline,
                'content': article[0].content,
                'date':  article[0].pub_date,
        }
        return render(request, 'news.html', ctx)
    return render(request, '404.html')

def historic(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'historic': articles}
    return render(request, 'historic.html',ctx)

def baktum_manual(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'baktum-manual.html', ctx)

def tutorial_queus(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'tutorial-queus.html', ctx)

def mingus_manual(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'mingus-manual.html', ctx)

def mkl(request):
    return render(request, 'mkl.html')

def cernlib(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'cernlib.html', ctx)

def release_notes(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'release-notes.html', ctx)

def vml_notes(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'vml-notes.html', ctx)

def fftw2xmkl_notes(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'fftw2xmkl-notes.html', ctx)

def fftw3xmkl_notes(request):
    articles = list(Article.objects.all().order_by("-pub_date"))
    ctx = {'news': articles,
            'number_articles':NUM_ARTICLES_SHOWED
    }
    return render(request, 'fftw3xmkl-notes.html', ctx)

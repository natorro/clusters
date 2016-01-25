from django.shortcuts import render
from .models import Article

# Create your views here.
def init(request):
    
    return render(request, 'index.html')

def features(request):
    return render(request, 'features.html')

def software(request):
    return render(request, 'software.html')

def manuals(request):
    return render(request, 'manuals.html')

def research(request):
    return render(request, 'research.html')

def lists(request):
    return render(request, 'lists.html')

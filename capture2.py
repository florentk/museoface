#!/usr/bin/env python3
# -*- coding: utf-8 -*-

# author : Florent Kaisser <florent@kaisser.name>
# maintainer : Museomix


import cv2 as cv
import numpy as np
import argparse
max_value = 255
max_value_H = 360//2
low_H = 0
low_S = 0
low_V = 0
high_H = max_value_H
high_S = max_value
high_V = max_value
window_capture_name = 'Video Capture'
window_detection_name = 'Object Detection'
low_H_name = 'Low H'
low_S_name = 'Low S'
low_V_name = 'Low V'
high_H_name = 'High H'
high_S_name = 'High S'
high_V_name = 'High V'

enregistre= 0
annule = 0
etat = 0

def on_low_H_thresh_trackbar(val):
    global low_H
    global high_H
    low_H = val
    low_H = min(high_H-1, low_H)
    cv.setTrackbarPos(low_H_name, window_detection_name, low_H)
def on_high_H_thresh_trackbar(val):
    global low_H
    global high_H
    high_H = val
    high_H = max(high_H, low_H+1)
    cv.setTrackbarPos(high_H_name, window_detection_name, high_H)
def on_low_S_thresh_trackbar(val):
    global low_S
    global high_S
    low_S = val
    low_S = min(high_S-1, low_S)
    cv.setTrackbarPos(low_S_name, window_detection_name, low_S)
def on_high_S_thresh_trackbar(val):
    global low_S
    global high_S
    high_S = val
    high_S = max(high_S, low_S+1)
    cv.setTrackbarPos(high_S_name, window_detection_name, high_S)
def on_low_V_thresh_trackbar(val):
    global low_V
    global high_V
    low_V = val
    low_V = min(high_V-1, low_V)
    cv.setTrackbarPos(low_V_name, window_detection_name, low_V)
def on_high_V_thresh_trackbar(val):
    global low_V
    global high_V
    high_V = val
    high_V = max(high_V, low_V+1)
    cv.setTrackbarPos(high_V_name, window_detection_name, high_V)
    
    
def on_low_zoom(val):
    global zoom
    zoom = val
    
def on_mouse(event, x, y, flags, param):
    global enregistre
    global annule
    if(event == cv.EVENT_LBUTTONUP):
      enregistre = 1

    if(event == cv.EVENT_RBUTTONUP):
      annule = 1
      
    
def transform(frame, fgmask,newbg):

   # mask2 = np.where((fgmask==0),-1,1).astype('uint8')
    
    inv_fg_mask = cv.bitwise_not(fgmask)
    
    fg = cv.bitwise_and(frame,frame,mask = inv_fg_mask)
    bg = cv.bitwise_and(newbg,newbg,mask = fgmask)
    
    #cv.imshow('frame inv',fg)
    #cv.imshow('frame',bg)
    
    return cv.add(bg, fg)
    
def send_image(image_file):
  print ("send")


cap = cv.VideoCapture(0)


cv.namedWindow(window_capture_name)
cv.namedWindow(window_detection_name)
cv.createTrackbar(low_H_name, window_detection_name , low_H, max_value_H, on_low_H_thresh_trackbar)
cv.createTrackbar(high_H_name, window_detection_name , high_H, max_value_H, on_high_H_thresh_trackbar)
cv.createTrackbar(low_S_name, window_detection_name , low_S, max_value, on_low_S_thresh_trackbar)
cv.createTrackbar(high_S_name, window_detection_name , high_S, max_value, on_high_S_thresh_trackbar)
cv.createTrackbar(low_V_name, window_detection_name , low_V, max_value, on_low_V_thresh_trackbar)
cv.createTrackbar(high_V_name, window_detection_name , high_V, max_value, on_high_V_thresh_trackbar)

cv.namedWindow("result")
cv.createTrackbar("zoom", "result" , 0, 100, on_low_zoom)
cv.setMouseCallback("result", on_mouse);

newbg_orig = cv.imread('fond.jpg',cv.IMREAD_COLOR)

width = int(cap.get(3))
height = int(cap.get(4))

newbg = cv.resize(newbg_orig, (width, height)) 


while True:

    if (etat == 1):
    
      cv.imshow('result', photo)
    
      key = cv.waitKey(30)
      if key == ord('q') or key == 27 or (annule == 1):
        etat = 0
        annule = 0
        
      if key == ord('e') or (enregistre == 1):
        send_image('result.jpg')
        break
    else:
    
      ret, frame = cap.read()
      if frame is None:
          break
      frame_HSV = cv.cvtColor(frame, cv.COLOR_BGR2HSV)
      frame_threshold = cv.inRange(frame_HSV, (40, low_S, low_V), (high_H, high_S, high_V))
      
      
      cv.imshow(window_capture_name, frame)
      #cv.imshow(window_detection_name, frame_threshold)
      
      result = transform(frame,frame_threshold,newbg)
      
      cv.imshow('result',result)
      
      cv.moveWindow("result", 0, 0);
      cv.setWindowProperty("result", cv.WND_PROP_FULLSCREEN, cv.WINDOW_FULLSCREEN);
      
      key = cv.waitKey(30)
      if key == ord('q') or key == 27:
          break
          
      if key == ord('e') or (enregistre == 1):
          enregistre = 0
          photo = result
          cv.imwrite('result.jpg',photo)
          etat = 1
        
      




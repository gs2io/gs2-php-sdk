<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Watch\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateAlarmRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateAlarm";

	/** @var string 名前 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string サービス名 */
	private $service;

	/** @var string リソースGRN */
	private $serviceId;

	/** @var string 操作名 */
	private $operation;

	/** @var string 演算子 */
	private $expression;

	/** @var double 閾値 */
	private $threshold;

	/** @var string 通知先 GS2-Notification 通知GRN */
	private $notificationId;


	/**
	 * 名前を取得
	 *
	 * @return string 名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string $name 名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string $name 名前
	 * @return CreateAlarmRequest
	 */
	public function withName($name): CreateAlarmRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * 説明文を取得
	 *
	 * @return string 説明文
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 * @return CreateAlarmRequest
	 */
	public function withDescription($description): CreateAlarmRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * サービス名を取得
	 *
	 * @return string サービス名
	 */
	public function getService() {
		return $this->service;
	}

	/**
	 * サービス名を設定
	 *
	 * @param string $service サービス名
	 */
	public function setService($service) {
		$this->service = $service;
	}

	/**
	 * サービス名を設定
	 *
	 * @param string $service サービス名
	 * @return CreateAlarmRequest
	 */
	public function withService($service): CreateAlarmRequest {
		$this->setService($service);
		return $this;
	}

	/**
	 * リソースGRNを取得
	 *
	 * @return string リソースGRN
	 */
	public function getServiceId() {
		return $this->serviceId;
	}

	/**
	 * リソースGRNを設定
	 *
	 * @param string $serviceId リソースGRN
	 */
	public function setServiceId($serviceId) {
		$this->serviceId = $serviceId;
	}

	/**
	 * リソースGRNを設定
	 *
	 * @param string $serviceId リソースGRN
	 * @return CreateAlarmRequest
	 */
	public function withServiceId($serviceId): CreateAlarmRequest {
		$this->setServiceId($serviceId);
		return $this;
	}

	/**
	 * 操作名を取得
	 *
	 * @return string 操作名
	 */
	public function getOperation() {
		return $this->operation;
	}

	/**
	 * 操作名を設定
	 *
	 * @param string $operation 操作名
	 */
	public function setOperation($operation) {
		$this->operation = $operation;
	}

	/**
	 * 操作名を設定
	 *
	 * @param string $operation 操作名
	 * @return CreateAlarmRequest
	 */
	public function withOperation($operation): CreateAlarmRequest {
		$this->setOperation($operation);
		return $this;
	}

	/**
	 * 演算子を取得
	 *
	 * @return string 演算子
	 */
	public function getExpression() {
		return $this->expression;
	}

	/**
	 * 演算子を設定
	 *
	 * @param string $expression 演算子
	 */
	public function setExpression($expression) {
		$this->expression = $expression;
	}

	/**
	 * 演算子を設定
	 *
	 * @param string $expression 演算子
	 * @return CreateAlarmRequest
	 */
	public function withExpression($expression): CreateAlarmRequest {
		$this->setExpression($expression);
		return $this;
	}

	/**
	 * 閾値を取得
	 *
	 * @return double 閾値
	 */
	public function getThreshold() {
		return $this->threshold;
	}

	/**
	 * 閾値を設定
	 *
	 * @param double $threshold 閾値
	 */
	public function setThreshold($threshold) {
		$this->threshold = $threshold;
	}

	/**
	 * 閾値を設定
	 *
	 * @param double $threshold 閾値
	 * @return CreateAlarmRequest
	 */
	public function withThreshold($threshold): CreateAlarmRequest {
		$this->setThreshold($threshold);
		return $this;
	}

	/**
	 * 通知先 GS2-Notification 通知GRNを取得
	 *
	 * @return string 通知先 GS2-Notification 通知GRN
	 */
	public function getNotificationId() {
		return $this->notificationId;
	}

	/**
	 * 通知先 GS2-Notification 通知GRNを設定
	 *
	 * @param string $notificationId 通知先 GS2-Notification 通知GRN
	 */
	public function setNotificationId($notificationId) {
		$this->notificationId = $notificationId;
	}

	/**
	 * 通知先 GS2-Notification 通知GRNを設定
	 *
	 * @param string $notificationId 通知先 GS2-Notification 通知GRN
	 * @return CreateAlarmRequest
	 */
	public function withNotificationId($notificationId): CreateAlarmRequest {
		$this->setNotificationId($notificationId);
		return $this;
	}

}
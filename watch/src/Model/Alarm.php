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

namespace Gs2\Watch\Model;

/**
 * アラーム
 *
 * @author Game Server Services, Inc.
 *
 */
class Alarm {

	/** @var string アラームGRN */
	private $alarmId;

	/** @var string オーナーID */
	private $ownerId;

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

	/** @var string 現在の状態 */
	private $status;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/** @var int 最終ステータス変化日時(エポック秒) */
	private $lastStatusChangeAt;

	/**
	 * アラームGRNを取得
	 *
	 * @return string アラームGRN
	 */
	public function getAlarmId() {
		return $this->alarmId;
	}

	/**
	 * アラームGRNを設定
	 *
	 * @param string $alarmId アラームGRN
	 */
	public function setAlarmId($alarmId) {
		$this->alarmId = $alarmId;
	}

	/**
	 * アラームGRNを設定
	 *
	 * @param string $alarmId アラームGRN
	 * @return self
	 */
	public function withAlarmId($alarmId): self {
		$this->setAlarmId($alarmId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
		return $this;
	}

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
	 * @return self
	 */
	public function withName($name): self {
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
	 * @return self
	 */
	public function withDescription($description): self {
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
	 * @return self
	 */
	public function withService($service): self {
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
	 * @return self
	 */
	public function withServiceId($serviceId): self {
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
	 * @return self
	 */
	public function withOperation($operation): self {
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
	 * @return self
	 */
	public function withExpression($expression): self {
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
	 * @return self
	 */
	public function withThreshold($threshold): self {
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
	 * @return self
	 */
	public function withNotificationId($notificationId): self {
		$this->setNotificationId($notificationId);
		return $this;
	}

	/**
	 * 現在の状態を取得
	 *
	 * @return string 現在の状態
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * 現在の状態を設定
	 *
	 * @param string $status 現在の状態
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
	 * 現在の状態を設定
	 *
	 * @param string $status 現在の状態
	 * @return self
	 */
	public function withStatus($status): self {
		$this->setStatus($status);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 最終ステータス変化日時(エポック秒)を取得
	 *
	 * @return int 最終ステータス変化日時(エポック秒)
	 */
	public function getLastStatusChangeAt() {
		return $this->lastStatusChangeAt;
	}

	/**
	 * 最終ステータス変化日時(エポック秒)を設定
	 *
	 * @param int $lastStatusChangeAt 最終ステータス変化日時(エポック秒)
	 */
	public function setLastStatusChangeAt($lastStatusChangeAt) {
		$this->lastStatusChangeAt = $lastStatusChangeAt;
	}

	/**
	 * 最終ステータス変化日時(エポック秒)を設定
	 *
	 * @param int $lastStatusChangeAt 最終ステータス変化日時(エポック秒)
	 * @return self
	 */
	public function withLastStatusChangeAt($lastStatusChangeAt): self {
		$this->setLastStatusChangeAt($lastStatusChangeAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Alarm
	 */
    static function build(array $array)
    {
        $item = new Alarm();
        $item->setAlarmId(isset($array['alarmId']) ? $array['alarmId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setService(isset($array['service']) ? $array['service'] : null);
        $item->setServiceId(isset($array['serviceId']) ? $array['serviceId'] : null);
        $item->setOperation(isset($array['operation']) ? $array['operation'] : null);
        $item->setExpression(isset($array['expression']) ? $array['expression'] : null);
        $item->setThreshold(isset($array['threshold']) ? $array['threshold'] : null);
        $item->setNotificationId(isset($array['notificationId']) ? $array['notificationId'] : null);
        $item->setStatus(isset($array['status']) ? $array['status'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        $item->setLastStatusChangeAt(isset($array['lastStatusChangeAt']) ? $array['lastStatusChangeAt'] : null);
        return $item;
    }

}
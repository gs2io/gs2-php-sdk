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
class UpdateAlarmRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateAlarm";

	/** @var string アラームの名前を指定します。 */
	private $alarmName;

	/** @var string 説明文 */
	private $description;

	/** @var string 演算子 */
	private $expression;

	/** @var double 閾値 */
	private $threshold;

	/** @var string 通知先 GS2-Notification 通知GRN */
	private $notificationId;


	/**
	 * アラームの名前を指定します。を取得
	 *
	 * @return string アラームの名前を指定します。
	 */
	public function getAlarmName() {
		return $this->alarmName;
	}

	/**
	 * アラームの名前を指定します。を設定
	 *
	 * @param string $alarmName アラームの名前を指定します。
	 */
	public function setAlarmName($alarmName) {
		$this->alarmName = $alarmName;
	}

	/**
	 * アラームの名前を指定します。を設定
	 *
	 * @param string $alarmName アラームの名前を指定します。
	 * @return UpdateAlarmRequest
	 */
	public function withAlarmName($alarmName): UpdateAlarmRequest {
		$this->setAlarmName($alarmName);
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
	 * @return UpdateAlarmRequest
	 */
	public function withDescription($description): UpdateAlarmRequest {
		$this->setDescription($description);
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
	 * @return UpdateAlarmRequest
	 */
	public function withExpression($expression): UpdateAlarmRequest {
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
	 * @return UpdateAlarmRequest
	 */
	public function withThreshold($threshold): UpdateAlarmRequest {
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
	 * @return UpdateAlarmRequest
	 */
	public function withNotificationId($notificationId): UpdateAlarmRequest {
		$this->setNotificationId($notificationId);
		return $this;
	}

}
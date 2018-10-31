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

namespace Gs2\Schedule\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateEventMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateEventMaster";

	/** @var string スケジュールの名前を指定します。 */
	private $scheduleName;

	/** @var string イベントマスター名 */
	private $name;

	/** @var string メタデータ */
	private $meta;

	/** @var string 期間 */
	private $type;

	/** @var int 絶対時間を選択した場合の開始日時 */
	private $absoluteBegin;

	/** @var int 絶対時間を選択した場合の終了日時 */
	private $absoluteEnd;

	/** @var string 相対時間を選択した場合の開始トリガー名 */
	private $relativeTriggerName;

	/** @var int 相対時間を選択した場合のトリガーを引いてからのイベント期間(分) */
	private $relativeSpan;


	/**
	 * スケジュールの名前を指定します。を取得
	 *
	 * @return string スケジュールの名前を指定します。
	 */
	public function getScheduleName() {
		return $this->scheduleName;
	}

	/**
	 * スケジュールの名前を指定します。を設定
	 *
	 * @param string $scheduleName スケジュールの名前を指定します。
	 */
	public function setScheduleName($scheduleName) {
		$this->scheduleName = $scheduleName;
	}

	/**
	 * スケジュールの名前を指定します。を設定
	 *
	 * @param string $scheduleName スケジュールの名前を指定します。
	 * @return CreateEventMasterRequest
	 */
	public function withScheduleName($scheduleName): CreateEventMasterRequest {
		$this->setScheduleName($scheduleName);
		return $this;
	}

	/**
	 * イベントマスター名を取得
	 *
	 * @return string イベントマスター名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * イベントマスター名を設定
	 *
	 * @param string $name イベントマスター名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * イベントマスター名を設定
	 *
	 * @param string $name イベントマスター名
	 * @return CreateEventMasterRequest
	 */
	public function withName($name): CreateEventMasterRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * メタデータを取得
	 *
	 * @return string メタデータ
	 */
	public function getMeta() {
		return $this->meta;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string $meta メタデータ
	 */
	public function setMeta($meta) {
		$this->meta = $meta;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string $meta メタデータ
	 * @return CreateEventMasterRequest
	 */
	public function withMeta($meta): CreateEventMasterRequest {
		$this->setMeta($meta);
		return $this;
	}

	/**
	 * 期間を取得
	 *
	 * @return string 期間
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * 期間を設定
	 *
	 * @param string $type 期間
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * 期間を設定
	 *
	 * @param string $type 期間
	 * @return CreateEventMasterRequest
	 */
	public function withType($type): CreateEventMasterRequest {
		$this->setType($type);
		return $this;
	}

	/**
	 * 絶対時間を選択した場合の開始日時を取得
	 *
	 * @return int 絶対時間を選択した場合の開始日時
	 */
	public function getAbsoluteBegin() {
		return $this->absoluteBegin;
	}

	/**
	 * 絶対時間を選択した場合の開始日時を設定
	 *
	 * @param int $absoluteBegin 絶対時間を選択した場合の開始日時
	 */
	public function setAbsoluteBegin($absoluteBegin) {
		$this->absoluteBegin = $absoluteBegin;
	}

	/**
	 * 絶対時間を選択した場合の開始日時を設定
	 *
	 * @param int $absoluteBegin 絶対時間を選択した場合の開始日時
	 * @return CreateEventMasterRequest
	 */
	public function withAbsoluteBegin($absoluteBegin): CreateEventMasterRequest {
		$this->setAbsoluteBegin($absoluteBegin);
		return $this;
	}

	/**
	 * 絶対時間を選択した場合の終了日時を取得
	 *
	 * @return int 絶対時間を選択した場合の終了日時
	 */
	public function getAbsoluteEnd() {
		return $this->absoluteEnd;
	}

	/**
	 * 絶対時間を選択した場合の終了日時を設定
	 *
	 * @param int $absoluteEnd 絶対時間を選択した場合の終了日時
	 */
	public function setAbsoluteEnd($absoluteEnd) {
		$this->absoluteEnd = $absoluteEnd;
	}

	/**
	 * 絶対時間を選択した場合の終了日時を設定
	 *
	 * @param int $absoluteEnd 絶対時間を選択した場合の終了日時
	 * @return CreateEventMasterRequest
	 */
	public function withAbsoluteEnd($absoluteEnd): CreateEventMasterRequest {
		$this->setAbsoluteEnd($absoluteEnd);
		return $this;
	}

	/**
	 * 相対時間を選択した場合の開始トリガー名を取得
	 *
	 * @return string 相対時間を選択した場合の開始トリガー名
	 */
	public function getRelativeTriggerName() {
		return $this->relativeTriggerName;
	}

	/**
	 * 相対時間を選択した場合の開始トリガー名を設定
	 *
	 * @param string $relativeTriggerName 相対時間を選択した場合の開始トリガー名
	 */
	public function setRelativeTriggerName($relativeTriggerName) {
		$this->relativeTriggerName = $relativeTriggerName;
	}

	/**
	 * 相対時間を選択した場合の開始トリガー名を設定
	 *
	 * @param string $relativeTriggerName 相対時間を選択した場合の開始トリガー名
	 * @return CreateEventMasterRequest
	 */
	public function withRelativeTriggerName($relativeTriggerName): CreateEventMasterRequest {
		$this->setRelativeTriggerName($relativeTriggerName);
		return $this;
	}

	/**
	 * 相対時間を選択した場合のトリガーを引いてからのイベント期間(分)を取得
	 *
	 * @return int 相対時間を選択した場合のトリガーを引いてからのイベント期間(分)
	 */
	public function getRelativeSpan() {
		return $this->relativeSpan;
	}

	/**
	 * 相対時間を選択した場合のトリガーを引いてからのイベント期間(分)を設定
	 *
	 * @param int $relativeSpan 相対時間を選択した場合のトリガーを引いてからのイベント期間(分)
	 */
	public function setRelativeSpan($relativeSpan) {
		$this->relativeSpan = $relativeSpan;
	}

	/**
	 * 相対時間を選択した場合のトリガーを引いてからのイベント期間(分)を設定
	 *
	 * @param int $relativeSpan 相対時間を選択した場合のトリガーを引いてからのイベント期間(分)
	 * @return CreateEventMasterRequest
	 */
	public function withRelativeSpan($relativeSpan): CreateEventMasterRequest {
		$this->setRelativeSpan($relativeSpan);
		return $this;
	}

}
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

namespace Gs2\Schedule\Model;

/**
 * イベントマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class EventMaster {

	/** @var string イベントマスターGRN */
	private $eventMasterId;

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

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * イベントマスターGRNを取得
	 *
	 * @return string イベントマスターGRN
	 */
	public function getEventMasterId() {
		return $this->eventMasterId;
	}

	/**
	 * イベントマスターGRNを設定
	 *
	 * @param string $eventMasterId イベントマスターGRN
	 */
	public function setEventMasterId($eventMasterId) {
		$this->eventMasterId = $eventMasterId;
	}

	/**
	 * イベントマスターGRNを設定
	 *
	 * @param string $eventMasterId イベントマスターGRN
	 * @return self
	 */
	public function withEventMasterId($eventMasterId): self {
		$this->setEventMasterId($eventMasterId);
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
	 * @return self
	 */
	public function withName($name): self {
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
	 * @return self
	 */
	public function withMeta($meta): self {
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
	 * @return self
	 */
	public function withType($type): self {
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
	 * @return self
	 */
	public function withAbsoluteBegin($absoluteBegin): self {
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
	 * @return self
	 */
	public function withAbsoluteEnd($absoluteEnd): self {
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
	 * @return self
	 */
	public function withRelativeTriggerName($relativeTriggerName): self {
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
	 * @return self
	 */
	public function withRelativeSpan($relativeSpan): self {
		$this->setRelativeSpan($relativeSpan);
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
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return EventMaster
	 */
    static function build(array $array)
    {
        $item = new EventMaster();
        $item->setEventMasterId(isset($array['eventMasterId']) ? $array['eventMasterId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setType(isset($array['type']) ? $array['type'] : null);
        $item->setAbsoluteBegin(isset($array['absoluteBegin']) ? $array['absoluteBegin'] : null);
        $item->setAbsoluteEnd(isset($array['absoluteEnd']) ? $array['absoluteEnd'] : null);
        $item->setRelativeTriggerName(isset($array['relativeTriggerName']) ? $array['relativeTriggerName'] : null);
        $item->setRelativeSpan(isset($array['relativeSpan']) ? $array['relativeSpan'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}
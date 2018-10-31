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
 * イベント
 *
 * @author Game Server Services, Inc.
 *
 */
class Event {

	/** @var string イベント名 */
	private $name;

	/** @var string メタデータ */
	private $meta;

	/** @var int 開始日時 */
	private $begin;

	/** @var int 終了日時 */
	private $end;

	/**
	 * イベント名を取得
	 *
	 * @return string イベント名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * イベント名を設定
	 *
	 * @param string $name イベント名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * イベント名を設定
	 *
	 * @param string $name イベント名
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
	 * 開始日時を取得
	 *
	 * @return int 開始日時
	 */
	public function getBegin() {
		return $this->begin;
	}

	/**
	 * 開始日時を設定
	 *
	 * @param int $begin 開始日時
	 */
	public function setBegin($begin) {
		$this->begin = $begin;
	}

	/**
	 * 開始日時を設定
	 *
	 * @param int $begin 開始日時
	 * @return self
	 */
	public function withBegin($begin): self {
		$this->setBegin($begin);
		return $this;
	}

	/**
	 * 終了日時を取得
	 *
	 * @return int 終了日時
	 */
	public function getEnd() {
		return $this->end;
	}

	/**
	 * 終了日時を設定
	 *
	 * @param int $end 終了日時
	 */
	public function setEnd($end) {
		$this->end = $end;
	}

	/**
	 * 終了日時を設定
	 *
	 * @param int $end 終了日時
	 * @return self
	 */
	public function withEnd($end): self {
		$this->setEnd($end);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Event
	 */
    static function build(array $array)
    {
        $item = new Event();
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setBegin(isset($array['begin']) ? $array['begin'] : null);
        $item->setEnd(isset($array['end']) ? $array['end'] : null);
        return $item;
    }

}
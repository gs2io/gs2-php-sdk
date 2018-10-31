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

namespace Gs2\Gacha\Model;

/**
 * ガチャ
 *
 * @author Game Server Services, Inc.
 *
 */
class Gacha {

	/** @var string ガチャ名 */
	private $name;

	/** @var string メタデータ */
	private $meta;

	/** @var int 抽選回数 */
	private $drawCount;

	/**
	 * ガチャ名を取得
	 *
	 * @return string ガチャ名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ガチャ名を設定
	 *
	 * @param string $name ガチャ名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ガチャ名を設定
	 *
	 * @param string $name ガチャ名
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
	 * 抽選回数を取得
	 *
	 * @return int 抽選回数
	 */
	public function getDrawCount() {
		return $this->drawCount;
	}

	/**
	 * 抽選回数を設定
	 *
	 * @param int $drawCount 抽選回数
	 */
	public function setDrawCount($drawCount) {
		$this->drawCount = $drawCount;
	}

	/**
	 * 抽選回数を設定
	 *
	 * @param int $drawCount 抽選回数
	 * @return self
	 */
	public function withDrawCount($drawCount): self {
		$this->setDrawCount($drawCount);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Gacha
	 */
    static function build(array $array)
    {
        $item = new Gacha();
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setDrawCount(isset($array['drawCount']) ? $array['drawCount'] : null);
        return $item;
    }

}
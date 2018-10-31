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
 * 景品
 *
 * @author Game Server Services, Inc.
 *
 */
class Prize {

	/** @var string ガチャプール名 */
	private $gachaPoolName;

	/** @var string ガチャ名 */
	private $gachaName;

	/** @var array 景品リスト */
	private $resourceIds;

	/**
	 * ガチャプール名を取得
	 *
	 * @return string ガチャプール名
	 */
	public function getGachaPoolName() {
		return $this->gachaPoolName;
	}

	/**
	 * ガチャプール名を設定
	 *
	 * @param string $gachaPoolName ガチャプール名
	 */
	public function setGachaPoolName($gachaPoolName) {
		$this->gachaPoolName = $gachaPoolName;
	}

	/**
	 * ガチャプール名を設定
	 *
	 * @param string $gachaPoolName ガチャプール名
	 * @return self
	 */
	public function withGachaPoolName($gachaPoolName): self {
		$this->setGachaPoolName($gachaPoolName);
		return $this;
	}

	/**
	 * ガチャ名を取得
	 *
	 * @return string ガチャ名
	 */
	public function getGachaName() {
		return $this->gachaName;
	}

	/**
	 * ガチャ名を設定
	 *
	 * @param string $gachaName ガチャ名
	 */
	public function setGachaName($gachaName) {
		$this->gachaName = $gachaName;
	}

	/**
	 * ガチャ名を設定
	 *
	 * @param string $gachaName ガチャ名
	 * @return self
	 */
	public function withGachaName($gachaName): self {
		$this->setGachaName($gachaName);
		return $this;
	}

	/**
	 * 景品リストを取得
	 *
	 * @return array 景品リスト
	 */
	public function getResourceIds() {
		return $this->resourceIds;
	}

	/**
	 * 景品リストを設定
	 *
	 * @param array $resourceIds 景品リスト
	 */
	public function setResourceIds($resourceIds) {
		$this->resourceIds = $resourceIds;
	}

	/**
	 * 景品リストを設定
	 *
	 * @param array $resourceIds 景品リスト
	 * @return self
	 */
	public function withResourceIds($resourceIds): self {
		$this->setResourceIds($resourceIds);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Prize
	 */
    static function build(array $array)
    {
        $item = new Prize();
        $item->setGachaPoolName(isset($array['gachaPoolName']) ? $array['gachaPoolName'] : null);
        $item->setGachaName(isset($array['gachaName']) ? $array['gachaName'] : null);
        $item->setResourceIds(isset($array['resourceIds']) ? $array['resourceIds'] : null);
        return $item;
    }

}
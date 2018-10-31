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
class GachaMaster {

	/** @var string ガチャGRN */
	private $gachaId;

	/** @var string ガチャ名 */
	private $name;

	/** @var string メタデータ */
	private $meta;

	/** @var array 排出確率名リスト */
	private $prizeTableNames;

	/** @var string 景品の排出処理に使用する GS2-JobQueue */
	private $prizeJobQueueName;

	/** @var string 景品の排出処理に使用する GS2-JobQueue に指定する GS2-Script */
	private $prizeJobQueueScriptName;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ガチャGRNを取得
	 *
	 * @return string ガチャGRN
	 */
	public function getGachaId() {
		return $this->gachaId;
	}

	/**
	 * ガチャGRNを設定
	 *
	 * @param string $gachaId ガチャGRN
	 */
	public function setGachaId($gachaId) {
		$this->gachaId = $gachaId;
	}

	/**
	 * ガチャGRNを設定
	 *
	 * @param string $gachaId ガチャGRN
	 * @return self
	 */
	public function withGachaId($gachaId): self {
		$this->setGachaId($gachaId);
		return $this;
	}

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
	 * 排出確率名リストを取得
	 *
	 * @return array 排出確率名リスト
	 */
	public function getPrizeTableNames() {
		return $this->prizeTableNames;
	}

	/**
	 * 排出確率名リストを設定
	 *
	 * @param array $prizeTableNames 排出確率名リスト
	 */
	public function setPrizeTableNames($prizeTableNames) {
		$this->prizeTableNames = $prizeTableNames;
	}

	/**
	 * 排出確率名リストを設定
	 *
	 * @param array $prizeTableNames 排出確率名リスト
	 * @return self
	 */
	public function withPrizeTableNames($prizeTableNames): self {
		$this->setPrizeTableNames($prizeTableNames);
		return $this;
	}

	/**
	 * 景品の排出処理に使用する GS2-JobQueueを取得
	 *
	 * @return string 景品の排出処理に使用する GS2-JobQueue
	 */
	public function getPrizeJobQueueName() {
		return $this->prizeJobQueueName;
	}

	/**
	 * 景品の排出処理に使用する GS2-JobQueueを設定
	 *
	 * @param string $prizeJobQueueName 景品の排出処理に使用する GS2-JobQueue
	 */
	public function setPrizeJobQueueName($prizeJobQueueName) {
		$this->prizeJobQueueName = $prizeJobQueueName;
	}

	/**
	 * 景品の排出処理に使用する GS2-JobQueueを設定
	 *
	 * @param string $prizeJobQueueName 景品の排出処理に使用する GS2-JobQueue
	 * @return self
	 */
	public function withPrizeJobQueueName($prizeJobQueueName): self {
		$this->setPrizeJobQueueName($prizeJobQueueName);
		return $this;
	}

	/**
	 * 景品の排出処理に使用する GS2-JobQueue に指定する GS2-Scriptを取得
	 *
	 * @return string 景品の排出処理に使用する GS2-JobQueue に指定する GS2-Script
	 */
	public function getPrizeJobQueueScriptName() {
		return $this->prizeJobQueueScriptName;
	}

	/**
	 * 景品の排出処理に使用する GS2-JobQueue に指定する GS2-Scriptを設定
	 *
	 * @param string $prizeJobQueueScriptName 景品の排出処理に使用する GS2-JobQueue に指定する GS2-Script
	 */
	public function setPrizeJobQueueScriptName($prizeJobQueueScriptName) {
		$this->prizeJobQueueScriptName = $prizeJobQueueScriptName;
	}

	/**
	 * 景品の排出処理に使用する GS2-JobQueue に指定する GS2-Scriptを設定
	 *
	 * @param string $prizeJobQueueScriptName 景品の排出処理に使用する GS2-JobQueue に指定する GS2-Script
	 * @return self
	 */
	public function withPrizeJobQueueScriptName($prizeJobQueueScriptName): self {
		$this->setPrizeJobQueueScriptName($prizeJobQueueScriptName);
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
	 * @return GachaMaster
	 */
    static function build(array $array)
    {
        $item = new GachaMaster();
        $item->setGachaId(isset($array['gachaId']) ? $array['gachaId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setPrizeTableNames(isset($array['prizeTableNames']) ? $array['prizeTableNames'] : null);
        $item->setPrizeJobQueueName(isset($array['prizeJobQueueName']) ? $array['prizeJobQueueName'] : null);
        $item->setPrizeJobQueueScriptName(isset($array['prizeJobQueueScriptName']) ? $array['prizeJobQueueScriptName'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}
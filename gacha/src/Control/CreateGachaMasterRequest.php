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

namespace Gs2\Gacha\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateGachaMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateGachaMaster";

	/** @var string ガチャプールの名前を指定します。 */
	private $gachaPoolName;

	/** @var string ガチャ名 */
	private $name;

	/** @var string メタデータ */
	private $meta;

	/** @var string[] 排出確率名リスト */
	private $prizeTableNames;

	/** @var string 景品の排出処理に使用する GS2-JobQueue */
	private $prizeJobQueueName;

	/** @var string 景品の排出処理に使用する GS2-JobQueue に指定する GS2-Script */
	private $prizeJobQueueScriptName;


	/**
	 * ガチャプールの名前を指定します。を取得
	 *
	 * @return string ガチャプールの名前を指定します。
	 */
	public function getGachaPoolName() {
		return $this->gachaPoolName;
	}

	/**
	 * ガチャプールの名前を指定します。を設定
	 *
	 * @param string $gachaPoolName ガチャプールの名前を指定します。
	 */
	public function setGachaPoolName($gachaPoolName) {
		$this->gachaPoolName = $gachaPoolName;
	}

	/**
	 * ガチャプールの名前を指定します。を設定
	 *
	 * @param string $gachaPoolName ガチャプールの名前を指定します。
	 * @return CreateGachaMasterRequest
	 */
	public function withGachaPoolName($gachaPoolName): CreateGachaMasterRequest {
		$this->setGachaPoolName($gachaPoolName);
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
	 * @return CreateGachaMasterRequest
	 */
	public function withName($name): CreateGachaMasterRequest {
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
	 * @return CreateGachaMasterRequest
	 */
	public function withMeta($meta): CreateGachaMasterRequest {
		$this->setMeta($meta);
		return $this;
	}

	/**
	 * 排出確率名リストを取得
	 *
	 * @return string[] 排出確率名リスト
	 */
	public function getPrizeTableNames() {
		return $this->prizeTableNames;
	}

	/**
	 * 排出確率名リストを設定
	 *
	 * @param string[] $prizeTableNames 排出確率名リスト
	 */
	public function setPrizeTableNames($prizeTableNames) {
		$this->prizeTableNames = $prizeTableNames;
	}

	/**
	 * 排出確率名リストを設定
	 *
	 * @param string[] $prizeTableNames 排出確率名リスト
	 * @return CreateGachaMasterRequest
	 */
	public function withPrizeTableNames($prizeTableNames): CreateGachaMasterRequest {
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
	 * @return CreateGachaMasterRequest
	 */
	public function withPrizeJobQueueName($prizeJobQueueName): CreateGachaMasterRequest {
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
	 * @return CreateGachaMasterRequest
	 */
	public function withPrizeJobQueueScriptName($prizeJobQueueScriptName): CreateGachaMasterRequest {
		$this->setPrizeJobQueueScriptName($prizeJobQueueScriptName);
		return $this;
	}

}
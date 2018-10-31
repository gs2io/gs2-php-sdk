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

namespace Gs2\Ranking\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateRankingTableRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateRankingTable";

	/** @var string ランキングテーブルの名前 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string スコア登録時 に実行されるGS2-Script */
	private $putScoreTriggerScript;

	/** @var string スコア登録完了時 に実行されるGS2-Script */
	private $putScoreDoneTriggerScript;

	/** @var string 集計処理完了時 に実行されるGS2-Script */
	private $calculateRankingDoneTriggerScript;


	/**
	 * ランキングテーブルの名前を取得
	 *
	 * @return string ランキングテーブルの名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ランキングテーブルの名前を設定
	 *
	 * @param string $name ランキングテーブルの名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ランキングテーブルの名前を設定
	 *
	 * @param string $name ランキングテーブルの名前
	 * @return CreateRankingTableRequest
	 */
	public function withName($name): CreateRankingTableRequest {
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
	 * @return CreateRankingTableRequest
	 */
	public function withDescription($description): CreateRankingTableRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * スコア登録時 に実行されるGS2-Scriptを取得
	 *
	 * @return string スコア登録時 に実行されるGS2-Script
	 */
	public function getPutScoreTriggerScript() {
		return $this->putScoreTriggerScript;
	}

	/**
	 * スコア登録時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $putScoreTriggerScript スコア登録時 に実行されるGS2-Script
	 */
	public function setPutScoreTriggerScript($putScoreTriggerScript) {
		$this->putScoreTriggerScript = $putScoreTriggerScript;
	}

	/**
	 * スコア登録時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $putScoreTriggerScript スコア登録時 に実行されるGS2-Script
	 * @return CreateRankingTableRequest
	 */
	public function withPutScoreTriggerScript($putScoreTriggerScript): CreateRankingTableRequest {
		$this->setPutScoreTriggerScript($putScoreTriggerScript);
		return $this;
	}

	/**
	 * スコア登録完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string スコア登録完了時 に実行されるGS2-Script
	 */
	public function getPutScoreDoneTriggerScript() {
		return $this->putScoreDoneTriggerScript;
	}

	/**
	 * スコア登録完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $putScoreDoneTriggerScript スコア登録完了時 に実行されるGS2-Script
	 */
	public function setPutScoreDoneTriggerScript($putScoreDoneTriggerScript) {
		$this->putScoreDoneTriggerScript = $putScoreDoneTriggerScript;
	}

	/**
	 * スコア登録完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $putScoreDoneTriggerScript スコア登録完了時 に実行されるGS2-Script
	 * @return CreateRankingTableRequest
	 */
	public function withPutScoreDoneTriggerScript($putScoreDoneTriggerScript): CreateRankingTableRequest {
		$this->setPutScoreDoneTriggerScript($putScoreDoneTriggerScript);
		return $this;
	}

	/**
	 * 集計処理完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 集計処理完了時 に実行されるGS2-Script
	 */
	public function getCalculateRankingDoneTriggerScript() {
		return $this->calculateRankingDoneTriggerScript;
	}

	/**
	 * 集計処理完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $calculateRankingDoneTriggerScript 集計処理完了時 に実行されるGS2-Script
	 */
	public function setCalculateRankingDoneTriggerScript($calculateRankingDoneTriggerScript) {
		$this->calculateRankingDoneTriggerScript = $calculateRankingDoneTriggerScript;
	}

	/**
	 * 集計処理完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $calculateRankingDoneTriggerScript 集計処理完了時 に実行されるGS2-Script
	 * @return CreateRankingTableRequest
	 */
	public function withCalculateRankingDoneTriggerScript($calculateRankingDoneTriggerScript): CreateRankingTableRequest {
		$this->setCalculateRankingDoneTriggerScript($calculateRankingDoneTriggerScript);
		return $this;
	}

}
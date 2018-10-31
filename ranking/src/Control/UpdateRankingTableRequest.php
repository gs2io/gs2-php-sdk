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
class UpdateRankingTableRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateRankingTable";

	/** @var string ランキングテーブルの名前を指定します。 */
	private $rankingTableName;

	/** @var string 説明文 */
	private $description;

	/** @var string スコア登録時 */
	private $putScoreTriggerScript;

	/** @var string スコア登録完了時 に実行されるGS2-Script */
	private $putScoreDoneTriggerScript;

	/** @var string 集計処理完了時 に実行されるGS2-Script */
	private $calculateRankingDoneTriggerScript;


	/**
	 * ランキングテーブルの名前を指定します。を取得
	 *
	 * @return string ランキングテーブルの名前を指定します。
	 */
	public function getRankingTableName() {
		return $this->rankingTableName;
	}

	/**
	 * ランキングテーブルの名前を指定します。を設定
	 *
	 * @param string $rankingTableName ランキングテーブルの名前を指定します。
	 */
	public function setRankingTableName($rankingTableName) {
		$this->rankingTableName = $rankingTableName;
	}

	/**
	 * ランキングテーブルの名前を指定します。を設定
	 *
	 * @param string $rankingTableName ランキングテーブルの名前を指定します。
	 * @return UpdateRankingTableRequest
	 */
	public function withRankingTableName($rankingTableName): UpdateRankingTableRequest {
		$this->setRankingTableName($rankingTableName);
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
	 * @return UpdateRankingTableRequest
	 */
	public function withDescription($description): UpdateRankingTableRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * スコア登録時を取得
	 *
	 * @return string スコア登録時
	 */
	public function getPutScoreTriggerScript() {
		return $this->putScoreTriggerScript;
	}

	/**
	 * スコア登録時を設定
	 *
	 * @param string $putScoreTriggerScript スコア登録時
	 */
	public function setPutScoreTriggerScript($putScoreTriggerScript) {
		$this->putScoreTriggerScript = $putScoreTriggerScript;
	}

	/**
	 * スコア登録時を設定
	 *
	 * @param string $putScoreTriggerScript スコア登録時
	 * @return UpdateRankingTableRequest
	 */
	public function withPutScoreTriggerScript($putScoreTriggerScript): UpdateRankingTableRequest {
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
	 * @return UpdateRankingTableRequest
	 */
	public function withPutScoreDoneTriggerScript($putScoreDoneTriggerScript): UpdateRankingTableRequest {
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
	 * @return UpdateRankingTableRequest
	 */
	public function withCalculateRankingDoneTriggerScript($calculateRankingDoneTriggerScript): UpdateRankingTableRequest {
		$this->setCalculateRankingDoneTriggerScript($calculateRankingDoneTriggerScript);
		return $this;
	}

}
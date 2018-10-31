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
class CreateGameModeRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateGameMode";

	/** @var string ランキングテーブルの名前を指定します。 */
	private $rankingTableName;

	/** @var string ゲームモード名 */
	private $gameMode;

	/** @var bool スコアを順位付けするときに小さいスコアのほうがハイスコアな場合は true */
	private $asc;

	/** @var int このゲームモードのランキング集計間隔を分単位で指定します */
	private $calcInterval;

	/** @var string スコア登録時 に実行されるGS2-Script */
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
	 * @return CreateGameModeRequest
	 */
	public function withRankingTableName($rankingTableName): CreateGameModeRequest {
		$this->setRankingTableName($rankingTableName);
		return $this;
	}

	/**
	 * ゲームモード名を取得
	 *
	 * @return string ゲームモード名
	 */
	public function getGameMode() {
		return $this->gameMode;
	}

	/**
	 * ゲームモード名を設定
	 *
	 * @param string $gameMode ゲームモード名
	 */
	public function setGameMode($gameMode) {
		$this->gameMode = $gameMode;
	}

	/**
	 * ゲームモード名を設定
	 *
	 * @param string $gameMode ゲームモード名
	 * @return CreateGameModeRequest
	 */
	public function withGameMode($gameMode): CreateGameModeRequest {
		$this->setGameMode($gameMode);
		return $this;
	}

	/**
	 * スコアを順位付けするときに小さいスコアのほうがハイスコアな場合は trueを取得
	 *
	 * @return bool スコアを順位付けするときに小さいスコアのほうがハイスコアな場合は true
	 */
	public function getAsc() {
		return $this->asc;
	}

	/**
	 * スコアを順位付けするときに小さいスコアのほうがハイスコアな場合は trueを設定
	 *
	 * @param bool $asc スコアを順位付けするときに小さいスコアのほうがハイスコアな場合は true
	 */
	public function setAsc($asc) {
		$this->asc = $asc;
	}

	/**
	 * スコアを順位付けするときに小さいスコアのほうがハイスコアな場合は trueを設定
	 *
	 * @param bool $asc スコアを順位付けするときに小さいスコアのほうがハイスコアな場合は true
	 * @return CreateGameModeRequest
	 */
	public function withAsc($asc): CreateGameModeRequest {
		$this->setAsc($asc);
		return $this;
	}

	/**
	 * このゲームモードのランキング集計間隔を分単位で指定しますを取得
	 *
	 * @return int このゲームモードのランキング集計間隔を分単位で指定します
	 */
	public function getCalcInterval() {
		return $this->calcInterval;
	}

	/**
	 * このゲームモードのランキング集計間隔を分単位で指定しますを設定
	 *
	 * @param int $calcInterval このゲームモードのランキング集計間隔を分単位で指定します
	 */
	public function setCalcInterval($calcInterval) {
		$this->calcInterval = $calcInterval;
	}

	/**
	 * このゲームモードのランキング集計間隔を分単位で指定しますを設定
	 *
	 * @param int $calcInterval このゲームモードのランキング集計間隔を分単位で指定します
	 * @return CreateGameModeRequest
	 */
	public function withCalcInterval($calcInterval): CreateGameModeRequest {
		$this->setCalcInterval($calcInterval);
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
	 * @return CreateGameModeRequest
	 */
	public function withPutScoreTriggerScript($putScoreTriggerScript): CreateGameModeRequest {
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
	 * @return CreateGameModeRequest
	 */
	public function withPutScoreDoneTriggerScript($putScoreDoneTriggerScript): CreateGameModeRequest {
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
	 * @return CreateGameModeRequest
	 */
	public function withCalculateRankingDoneTriggerScript($calculateRankingDoneTriggerScript): CreateGameModeRequest {
		$this->setCalculateRankingDoneTriggerScript($calculateRankingDoneTriggerScript);
		return $this;
	}

}
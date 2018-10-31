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

namespace Gs2\Ranking\Model;

/**
 * ゲームモード
 *
 * @author Game Server Services, Inc.
 *
 */
class GameMode {

	/** @var string ゲームモードGRN */
	private $gameModeId;

	/** @var string ランキングテーブル */
	private $rankingTableId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string ゲームモード名 */
	private $gameMode;

	/** @var bool ランキング計算に昇順を適用するか */
	private $asc;

	/** @var int 集計間隔(分) */
	private $calcInterval;

	/** @var bool 集計処理中か否か */
	private $calculating;

	/** @var string スコア登録時 に実行されるGS2-Script */
	private $putScoreTriggerScript;

	/** @var string スコア登録完了時 に実行されるGS2-Script */
	private $putScoreDoneTriggerScript;

	/** @var string 集計処理完了時 に実行されるGS2-Script */
	private $calculateRankingDoneTriggerScript;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 更新日時(エポック秒) */
	private $updateAt;

	/** @var int 最終集計日時(エポック秒) */
	private $lastCalcAt;

	/**
	 * ゲームモードGRNを取得
	 *
	 * @return string ゲームモードGRN
	 */
	public function getGameModeId() {
		return $this->gameModeId;
	}

	/**
	 * ゲームモードGRNを設定
	 *
	 * @param string $gameModeId ゲームモードGRN
	 */
	public function setGameModeId($gameModeId) {
		$this->gameModeId = $gameModeId;
	}

	/**
	 * ゲームモードGRNを設定
	 *
	 * @param string $gameModeId ゲームモードGRN
	 * @return self
	 */
	public function withGameModeId($gameModeId): self {
		$this->setGameModeId($gameModeId);
		return $this;
	}

	/**
	 * ランキングテーブルを取得
	 *
	 * @return string ランキングテーブル
	 */
	public function getRankingTableId() {
		return $this->rankingTableId;
	}

	/**
	 * ランキングテーブルを設定
	 *
	 * @param string $rankingTableId ランキングテーブル
	 */
	public function setRankingTableId($rankingTableId) {
		$this->rankingTableId = $rankingTableId;
	}

	/**
	 * ランキングテーブルを設定
	 *
	 * @param string $rankingTableId ランキングテーブル
	 * @return self
	 */
	public function withRankingTableId($rankingTableId): self {
		$this->setRankingTableId($rankingTableId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
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
	 * @return self
	 */
	public function withGameMode($gameMode): self {
		$this->setGameMode($gameMode);
		return $this;
	}

	/**
	 * ランキング計算に昇順を適用するかを取得
	 *
	 * @return bool ランキング計算に昇順を適用するか
	 */
	public function getAsc() {
		return $this->asc;
	}

	/**
	 * ランキング計算に昇順を適用するかを設定
	 *
	 * @param bool $asc ランキング計算に昇順を適用するか
	 */
	public function setAsc($asc) {
		$this->asc = $asc;
	}

	/**
	 * ランキング計算に昇順を適用するかを設定
	 *
	 * @param bool $asc ランキング計算に昇順を適用するか
	 * @return self
	 */
	public function withAsc($asc): self {
		$this->setAsc($asc);
		return $this;
	}

	/**
	 * 集計間隔(分)を取得
	 *
	 * @return int 集計間隔(分)
	 */
	public function getCalcInterval() {
		return $this->calcInterval;
	}

	/**
	 * 集計間隔(分)を設定
	 *
	 * @param int $calcInterval 集計間隔(分)
	 */
	public function setCalcInterval($calcInterval) {
		$this->calcInterval = $calcInterval;
	}

	/**
	 * 集計間隔(分)を設定
	 *
	 * @param int $calcInterval 集計間隔(分)
	 * @return self
	 */
	public function withCalcInterval($calcInterval): self {
		$this->setCalcInterval($calcInterval);
		return $this;
	}

	/**
	 * 集計処理中か否かを取得
	 *
	 * @return bool 集計処理中か否か
	 */
	public function getCalculating() {
		return $this->calculating;
	}

	/**
	 * 集計処理中か否かを設定
	 *
	 * @param bool $calculating 集計処理中か否か
	 */
	public function setCalculating($calculating) {
		$this->calculating = $calculating;
	}

	/**
	 * 集計処理中か否かを設定
	 *
	 * @param bool $calculating 集計処理中か否か
	 * @return self
	 */
	public function withCalculating($calculating): self {
		$this->setCalculating($calculating);
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
	 * @return self
	 */
	public function withPutScoreTriggerScript($putScoreTriggerScript): self {
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
	 * @return self
	 */
	public function withPutScoreDoneTriggerScript($putScoreDoneTriggerScript): self {
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
	 * @return self
	 */
	public function withCalculateRankingDoneTriggerScript($calculateRankingDoneTriggerScript): self {
		$this->setCalculateRankingDoneTriggerScript($calculateRankingDoneTriggerScript);
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
	 * 更新日時(エポック秒)を取得
	 *
	 * @return int 更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 最終集計日時(エポック秒)を取得
	 *
	 * @return int 最終集計日時(エポック秒)
	 */
	public function getLastCalcAt() {
		return $this->lastCalcAt;
	}

	/**
	 * 最終集計日時(エポック秒)を設定
	 *
	 * @param int $lastCalcAt 最終集計日時(エポック秒)
	 */
	public function setLastCalcAt($lastCalcAt) {
		$this->lastCalcAt = $lastCalcAt;
	}

	/**
	 * 最終集計日時(エポック秒)を設定
	 *
	 * @param int $lastCalcAt 最終集計日時(エポック秒)
	 * @return self
	 */
	public function withLastCalcAt($lastCalcAt): self {
		$this->setLastCalcAt($lastCalcAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return GameMode
	 */
    static function build(array $array)
    {
        $item = new GameMode();
        $item->setGameModeId(isset($array['gameModeId']) ? $array['gameModeId'] : null);
        $item->setRankingTableId(isset($array['rankingTableId']) ? $array['rankingTableId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setGameMode(isset($array['gameMode']) ? $array['gameMode'] : null);
        $item->setAsc(isset($array['asc']) ? $array['asc'] : null);
        $item->setCalcInterval(isset($array['calcInterval']) ? $array['calcInterval'] : null);
        $item->setCalculating(isset($array['calculating']) ? $array['calculating'] : null);
        $item->setPutScoreTriggerScript(isset($array['putScoreTriggerScript']) ? $array['putScoreTriggerScript'] : null);
        $item->setPutScoreDoneTriggerScript(isset($array['putScoreDoneTriggerScript']) ? $array['putScoreDoneTriggerScript'] : null);
        $item->setCalculateRankingDoneTriggerScript(isset($array['calculateRankingDoneTriggerScript']) ? $array['calculateRankingDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        $item->setLastCalcAt(isset($array['lastCalcAt']) ? $array['lastCalcAt'] : null);
        return $item;
    }

}
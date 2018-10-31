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
 * ランキングテーブル
 *
 * @author Game Server Services, Inc.
 *
 */
class RankingTable {

	/** @var string ランキングテーブルGRN */
	private $rankingTableId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string ランキングテーブル名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string スコア登録時 に実行されるGS2-Script */
	private $putScoreTriggerScript;

	/** @var string スコア登録完了時 に実行されるGS2-Script */
	private $putScoreDoneTriggerScript;

	/** @var string 集計処理完了時 に実行されるGS2-Script */
	private $calculateRankingDoneTriggerScript;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ランキングテーブルGRNを取得
	 *
	 * @return string ランキングテーブルGRN
	 */
	public function getRankingTableId() {
		return $this->rankingTableId;
	}

	/**
	 * ランキングテーブルGRNを設定
	 *
	 * @param string $rankingTableId ランキングテーブルGRN
	 */
	public function setRankingTableId($rankingTableId) {
		$this->rankingTableId = $rankingTableId;
	}

	/**
	 * ランキングテーブルGRNを設定
	 *
	 * @param string $rankingTableId ランキングテーブルGRN
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
	 * ランキングテーブル名を取得
	 *
	 * @return string ランキングテーブル名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ランキングテーブル名を設定
	 *
	 * @param string $name ランキングテーブル名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ランキングテーブル名を設定
	 *
	 * @param string $name ランキングテーブル名
	 * @return self
	 */
	public function withName($name): self {
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
	 * @return self
	 */
	public function withDescription($description): self {
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
	 * @return RankingTable
	 */
    static function build(array $array)
    {
        $item = new RankingTable();
        $item->setRankingTableId(isset($array['rankingTableId']) ? $array['rankingTableId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setPutScoreTriggerScript(isset($array['putScoreTriggerScript']) ? $array['putScoreTriggerScript'] : null);
        $item->setPutScoreDoneTriggerScript(isset($array['putScoreDoneTriggerScript']) ? $array['putScoreDoneTriggerScript'] : null);
        $item->setCalculateRankingDoneTriggerScript(isset($array['calculateRankingDoneTriggerScript']) ? $array['calculateRankingDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}
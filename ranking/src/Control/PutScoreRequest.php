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

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class PutScoreRequest extends Gs2UserRequest {

    const FUNCTION = "PutScore";

	/** @var string ランキングテーブルの名前を指定します。 */
	private $rankingTableName;

	/** @var string ゲームモードの名前を指定します。 */
	private $gameMode;

	/** @var long スコア値 */
	private $score;

	/** @var string スコアに付随するメタ情報 */
	private $meta;


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
	 * @return PutScoreRequest
	 */
	public function withRankingTableName($rankingTableName): PutScoreRequest {
		$this->setRankingTableName($rankingTableName);
		return $this;
	}

	/**
	 * ゲームモードの名前を指定します。を取得
	 *
	 * @return string ゲームモードの名前を指定します。
	 */
	public function getGameMode() {
		return $this->gameMode;
	}

	/**
	 * ゲームモードの名前を指定します。を設定
	 *
	 * @param string $gameMode ゲームモードの名前を指定します。
	 */
	public function setGameMode($gameMode) {
		$this->gameMode = $gameMode;
	}

	/**
	 * ゲームモードの名前を指定します。を設定
	 *
	 * @param string $gameMode ゲームモードの名前を指定します。
	 * @return PutScoreRequest
	 */
	public function withGameMode($gameMode): PutScoreRequest {
		$this->setGameMode($gameMode);
		return $this;
	}

	/**
	 * スコア値を取得
	 *
	 * @return long スコア値
	 */
	public function getScore() {
		return $this->score;
	}

	/**
	 * スコア値を設定
	 *
	 * @param long $score スコア値
	 */
	public function setScore($score) {
		$this->score = $score;
	}

	/**
	 * スコア値を設定
	 *
	 * @param long $score スコア値
	 * @return PutScoreRequest
	 */
	public function withScore($score): PutScoreRequest {
		$this->setScore($score);
		return $this;
	}

	/**
	 * スコアに付随するメタ情報を取得
	 *
	 * @return string スコアに付随するメタ情報
	 */
	public function getMeta() {
		return $this->meta;
	}

	/**
	 * スコアに付随するメタ情報を設定
	 *
	 * @param string $meta スコアに付随するメタ情報
	 */
	public function setMeta($meta) {
		$this->meta = $meta;
	}

	/**
	 * スコアに付随するメタ情報を設定
	 *
	 * @param string $meta スコアに付随するメタ情報
	 * @return PutScoreRequest
	 */
	public function withMeta($meta): PutScoreRequest {
		$this->setMeta($meta);
		return $this;
	}

}
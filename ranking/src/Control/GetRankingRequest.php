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
class GetRankingRequest extends Gs2BasicRequest {

    const FUNCTION = "GetRanking";

	/** @var string ランキングテーブルの名前を指定します。 */
	private $rankingTableName;

	/** @var string ゲームモードの名前を指定します。 */
	private $gameMode;

	/** @var int ランキングの取得位置を指定します */
	private $offset;

	/** @var int ランキングの取得件数を指定します */
	private $limit;


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
	 * @return GetRankingRequest
	 */
	public function withRankingTableName($rankingTableName): GetRankingRequest {
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
	 * @return GetRankingRequest
	 */
	public function withGameMode($gameMode): GetRankingRequest {
		$this->setGameMode($gameMode);
		return $this;
	}

	/**
	 * ランキングの取得位置を指定しますを取得
	 *
	 * @return int ランキングの取得位置を指定します
	 */
	public function getOffset() {
		return $this->offset;
	}

	/**
	 * ランキングの取得位置を指定しますを設定
	 *
	 * @param int $offset ランキングの取得位置を指定します
	 */
	public function setOffset($offset) {
		$this->offset = $offset;
	}

	/**
	 * ランキングの取得位置を指定しますを設定
	 *
	 * @param int $offset ランキングの取得位置を指定します
	 * @return GetRankingRequest
	 */
	public function withOffset($offset): GetRankingRequest {
		$this->setOffset($offset);
		return $this;
	}

	/**
	 * ランキングの取得件数を指定しますを取得
	 *
	 * @return int ランキングの取得件数を指定します
	 */
	public function getLimit() {
		return $this->limit;
	}

	/**
	 * ランキングの取得件数を指定しますを設定
	 *
	 * @param int $limit ランキングの取得件数を指定します
	 */
	public function setLimit($limit) {
		$this->limit = $limit;
	}

	/**
	 * ランキングの取得件数を指定しますを設定
	 *
	 * @param int $limit ランキングの取得件数を指定します
	 * @return GetRankingRequest
	 */
	public function withLimit($limit): GetRankingRequest {
		$this->setLimit($limit);
		return $this;
	}

}
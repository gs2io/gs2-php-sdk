<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;

/**
 * 投票結果
 *
 * @author Game Server Services, Inc.
 *
 */
class WrittenBallot implements IModel {
	/**
     * @var Ballot 投票用紙
	 */
	protected $ballot;

	/**
	 * 投票用紙を取得
	 *
	 * @return Ballot|null 投票用紙
	 */
	public function getBallot(): ?Ballot {
		return $this->ballot;
	}

	/**
	 * 投票用紙を設定
	 *
	 * @param Ballot|null $ballot 投票用紙
	 */
	public function setBallot(?Ballot $ballot) {
		$this->ballot = $ballot;
	}

	/**
	 * 投票用紙を設定
	 *
	 * @param Ballot|null $ballot 投票用紙
	 * @return WrittenBallot $this
	 */
	public function withBallot(?Ballot $ballot): WrittenBallot {
		$this->ballot = $ballot;
		return $this;
	}
	/**
     * @var GameResult[] 投票内容。対戦結果のリスト
	 */
	protected $gameResults;

	/**
	 * 投票内容。対戦結果のリストを取得
	 *
	 * @return GameResult[]|null 投票内容。対戦結果のリスト
	 */
	public function getGameResults(): ?array {
		return $this->gameResults;
	}

	/**
	 * 投票内容。対戦結果のリストを設定
	 *
	 * @param GameResult[]|null $gameResults 投票内容。対戦結果のリスト
	 */
	public function setGameResults(?array $gameResults) {
		$this->gameResults = $gameResults;
	}

	/**
	 * 投票内容。対戦結果のリストを設定
	 *
	 * @param GameResult[]|null $gameResults 投票内容。対戦結果のリスト
	 * @return WrittenBallot $this
	 */
	public function withGameResults(?array $gameResults): WrittenBallot {
		$this->gameResults = $gameResults;
		return $this;
	}

    public function toJson(): array {
        return array(
            "ballot" => $this->ballot->toJson(),
            "gameResults" => array_map(
                function (GameResult $v) {
                    return $v->toJson();
                },
                $this->gameResults == null ? [] : $this->gameResults
            ),
        );
    }

    public static function fromJson(array $data): WrittenBallot {
        $model = new WrittenBallot();
        $model->setBallot(isset($data["ballot"]) ? Ballot::fromJson($data["ballot"]) : null);
        $model->setGameResults(array_map(
                function ($v) {
                    return GameResult::fromJson($v);
                },
                isset($data["gameResults"]) ? $data["gameResults"] : []
            )
        );
        return $model;
    }
}
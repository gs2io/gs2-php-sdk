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
 * 対戦結果
 *
 * @author Game Server Services, Inc.
 *
 */
class GameResult implements IModel {
	/**
     * @var int 順位
	 */
	protected $rank;

	/**
	 * 順位を取得
	 *
	 * @return int|null 順位
	 */
	public function getRank(): ?int {
		return $this->rank;
	}

	/**
	 * 順位を設定
	 *
	 * @param int|null $rank 順位
	 */
	public function setRank(?int $rank) {
		$this->rank = $rank;
	}

	/**
	 * 順位を設定
	 *
	 * @param int|null $rank 順位
	 * @return GameResult $this
	 */
	public function withRank(?int $rank): GameResult {
		$this->rank = $rank;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return GameResult $this
	 */
	public function withUserId(?string $userId): GameResult {
		$this->userId = $userId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "rank" => $this->rank,
            "userId" => $this->userId,
        );
    }

    public static function fromJson(array $data): GameResult {
        $model = new GameResult();
        $model->setRank(isset($data["rank"]) ? $data["rank"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        return $model;
    }
}
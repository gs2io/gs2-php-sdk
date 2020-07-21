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
 * 投票用紙
 *
 * @author Game Server Services, Inc.
 *
 */
class Ballot implements IModel {
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
	 * @return Ballot $this
	 */
	public function withUserId(?string $userId): Ballot {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string レーティング計算に使用するレーティング名
	 */
	protected $ratingName;

	/**
	 * レーティング計算に使用するレーティング名を取得
	 *
	 * @return string|null レーティング計算に使用するレーティング名
	 */
	public function getRatingName(): ?string {
		return $this->ratingName;
	}

	/**
	 * レーティング計算に使用するレーティング名を設定
	 *
	 * @param string|null $ratingName レーティング計算に使用するレーティング名
	 */
	public function setRatingName(?string $ratingName) {
		$this->ratingName = $ratingName;
	}

	/**
	 * レーティング計算に使用するレーティング名を設定
	 *
	 * @param string|null $ratingName レーティング計算に使用するレーティング名
	 * @return Ballot $this
	 */
	public function withRatingName(?string $ratingName): Ballot {
		$this->ratingName = $ratingName;
		return $this;
	}
	/**
     * @var string 投票対象のギャザリング名
	 */
	protected $gatheringName;

	/**
	 * 投票対象のギャザリング名を取得
	 *
	 * @return string|null 投票対象のギャザリング名
	 */
	public function getGatheringName(): ?string {
		return $this->gatheringName;
	}

	/**
	 * 投票対象のギャザリング名を設定
	 *
	 * @param string|null $gatheringName 投票対象のギャザリング名
	 */
	public function setGatheringName(?string $gatheringName) {
		$this->gatheringName = $gatheringName;
	}

	/**
	 * 投票対象のギャザリング名を設定
	 *
	 * @param string|null $gatheringName 投票対象のギャザリング名
	 * @return Ballot $this
	 */
	public function withGatheringName(?string $gatheringName): Ballot {
		$this->gatheringName = $gatheringName;
		return $this;
	}
	/**
     * @var int 参加人数
	 */
	protected $numberOfPlayer;

	/**
	 * 参加人数を取得
	 *
	 * @return int|null 参加人数
	 */
	public function getNumberOfPlayer(): ?int {
		return $this->numberOfPlayer;
	}

	/**
	 * 参加人数を設定
	 *
	 * @param int|null $numberOfPlayer 参加人数
	 */
	public function setNumberOfPlayer(?int $numberOfPlayer) {
		$this->numberOfPlayer = $numberOfPlayer;
	}

	/**
	 * 参加人数を設定
	 *
	 * @param int|null $numberOfPlayer 参加人数
	 * @return Ballot $this
	 */
	public function withNumberOfPlayer(?int $numberOfPlayer): Ballot {
		$this->numberOfPlayer = $numberOfPlayer;
		return $this;
	}

    public function toJson(): array {
        return array(
            "userId" => $this->userId,
            "ratingName" => $this->ratingName,
            "gatheringName" => $this->gatheringName,
            "numberOfPlayer" => $this->numberOfPlayer,
        );
    }

    public static function fromJson(array $data): Ballot {
        $model = new Ballot();
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setRatingName(isset($data["ratingName"]) ? $data["ratingName"] : null);
        $model->setGatheringName(isset($data["gatheringName"]) ? $data["gatheringName"] : null);
        $model->setNumberOfPlayer(isset($data["numberOfPlayer"]) ? $data["numberOfPlayer"] : null);
        return $model;
    }
}
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
 * 投票状況
 *
 * @author Game Server Services, Inc.
 *
 */
class Vote implements IModel {
	/**
     * @var string 投票状況
	 */
	protected $voteId;

	/**
	 * 投票状況を取得
	 *
	 * @return string|null 投票状況
	 */
	public function getVoteId(): ?string {
		return $this->voteId;
	}

	/**
	 * 投票状況を設定
	 *
	 * @param string|null $voteId 投票状況
	 */
	public function setVoteId(?string $voteId) {
		$this->voteId = $voteId;
	}

	/**
	 * 投票状況を設定
	 *
	 * @param string|null $voteId 投票状況
	 * @return Vote $this
	 */
	public function withVoteId(?string $voteId): Vote {
		$this->voteId = $voteId;
		return $this;
	}
	/**
     * @var string レーティング名
	 */
	protected $ratingName;

	/**
	 * レーティング名を取得
	 *
	 * @return string|null レーティング名
	 */
	public function getRatingName(): ?string {
		return $this->ratingName;
	}

	/**
	 * レーティング名を設定
	 *
	 * @param string|null $ratingName レーティング名
	 */
	public function setRatingName(?string $ratingName) {
		$this->ratingName = $ratingName;
	}

	/**
	 * レーティング名を設定
	 *
	 * @param string|null $ratingName レーティング名
	 * @return Vote $this
	 */
	public function withRatingName(?string $ratingName): Vote {
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
	 * @return Vote $this
	 */
	public function withGatheringName(?string $gatheringName): Vote {
		$this->gatheringName = $gatheringName;
		return $this;
	}
	/**
     * @var WrittenBallot[] 投票用紙のリスト
	 */
	protected $writtenBallots;

	/**
	 * 投票用紙のリストを取得
	 *
	 * @return WrittenBallot[]|null 投票用紙のリスト
	 */
	public function getWrittenBallots(): ?array {
		return $this->writtenBallots;
	}

	/**
	 * 投票用紙のリストを設定
	 *
	 * @param WrittenBallot[]|null $writtenBallots 投票用紙のリスト
	 */
	public function setWrittenBallots(?array $writtenBallots) {
		$this->writtenBallots = $writtenBallots;
	}

	/**
	 * 投票用紙のリストを設定
	 *
	 * @param WrittenBallot[]|null $writtenBallots 投票用紙のリスト
	 * @return Vote $this
	 */
	public function withWrittenBallots(?array $writtenBallots): Vote {
		$this->writtenBallots = $writtenBallots;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Vote $this
	 */
	public function withCreatedAt(?int $createdAt): Vote {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Vote $this
	 */
	public function withUpdatedAt(?int $updatedAt): Vote {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "voteId" => $this->voteId,
            "ratingName" => $this->ratingName,
            "gatheringName" => $this->gatheringName,
            "writtenBallots" => array_map(
                function (WrittenBallot $v) {
                    return $v->toJson();
                },
                $this->writtenBallots == null ? [] : $this->writtenBallots
            ),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Vote {
        $model = new Vote();
        $model->setVoteId(isset($data["voteId"]) ? $data["voteId"] : null);
        $model->setRatingName(isset($data["ratingName"]) ? $data["ratingName"] : null);
        $model->setGatheringName(isset($data["gatheringName"]) ? $data["gatheringName"] : null);
        $model->setWrittenBallots(array_map(
                function ($v) {
                    return WrittenBallot::fromJson($v);
                },
                isset($data["writtenBallots"]) ? $data["writtenBallots"] : []
            )
        );
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}
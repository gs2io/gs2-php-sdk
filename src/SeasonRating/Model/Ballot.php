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

namespace Gs2\SeasonRating\Model;

use Gs2\Core\Model\IModel;


class Ballot implements IModel {
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $seasonName;
	/**
     * @var string
	 */
	private $sessionName;
	/**
     * @var int
	 */
	private $numberOfPlayer;
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Ballot {
		$this->userId = $userId;
		return $this;
	}
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
	public function withSeasonName(?string $seasonName): Ballot {
		$this->seasonName = $seasonName;
		return $this;
	}
	public function getSessionName(): ?string {
		return $this->sessionName;
	}
	public function setSessionName(?string $sessionName) {
		$this->sessionName = $sessionName;
	}
	public function withSessionName(?string $sessionName): Ballot {
		$this->sessionName = $sessionName;
		return $this;
	}
	public function getNumberOfPlayer(): ?int {
		return $this->numberOfPlayer;
	}
	public function setNumberOfPlayer(?int $numberOfPlayer) {
		$this->numberOfPlayer = $numberOfPlayer;
	}
	public function withNumberOfPlayer(?int $numberOfPlayer): Ballot {
		$this->numberOfPlayer = $numberOfPlayer;
		return $this;
	}

    public static function fromJson(?array $data): ?Ballot {
        if ($data === null) {
            return null;
        }
        return (new Ballot())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withSessionName(array_key_exists('sessionName', $data) && $data['sessionName'] !== null ? $data['sessionName'] : null)
            ->withNumberOfPlayer(array_key_exists('numberOfPlayer', $data) && $data['numberOfPlayer'] !== null ? $data['numberOfPlayer'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "seasonName" => $this->getSeasonName(),
            "sessionName" => $this->getSessionName(),
            "numberOfPlayer" => $this->getNumberOfPlayer(),
        );
    }
}
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


/**
 * Match Session
 *
 * @see https://docs.gs2.io/api_reference/season_rating/sdk/#matchsession
 */
class MatchSession implements IModel {
	/**
     * @var string MatchSession GRN
	 */
	private $sessionId;
	/**
     * @var string Session name
	 */
	private $name;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null MatchSession GRN */
	public function getSessionId(): ?string {
		return $this->sessionId;
	}
    /** @param string|null $sessionId MatchSession GRN */
	public function setSessionId(?string $sessionId) {
		$this->sessionId = $sessionId;
	}
    /**
     * @param string|null $sessionId MatchSession GRN
     * @return MatchSession
     */
	public function withSessionId(?string $sessionId): MatchSession {
		$this->sessionId = $sessionId;
		return $this;
	}
    /** @return string|null Session name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Session name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Session name
     * @return MatchSession
     */
	public function withName(?string $name): MatchSession {
		$this->name = $name;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return MatchSession
     */
	public function withCreatedAt(?int $createdAt): MatchSession {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return MatchSession
     */
	public function withRevision(?int $revision): MatchSession {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?MatchSession {
        if ($data === null) {
            return null;
        }
        return (new MatchSession())
            ->withSessionId(array_key_exists('sessionId', $data) && $data['sessionId'] !== null ? $data['sessionId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "sessionId" => $this->getSessionId(),
            "name" => $this->getName(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}
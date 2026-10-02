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

namespace Gs2\SeasonRating\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for commitVote: Forced determination of voting status
 *
 * @see https://docs.gs2.io/api_reference/season_rating/sdk/#commitvote
 */
class CommitVoteRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Season Model name */
    private $seasonName;
    /** @var string Session Name */
    private $sessionName;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return CommitVoteRequest
     */
	public function withNamespaceName(?string $namespaceName): CommitVoteRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Season Model name */
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
    /** @param string|null $seasonName Season Model name */
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
    /**
     * @param string|null $seasonName Season Model name
     * @return CommitVoteRequest
     */
	public function withSeasonName(?string $seasonName): CommitVoteRequest {
		$this->seasonName = $seasonName;
		return $this;
	}
    /** @return string|null Session Name */
	public function getSessionName(): ?string {
		return $this->sessionName;
	}
    /** @param string|null $sessionName Session Name */
	public function setSessionName(?string $sessionName) {
		$this->sessionName = $sessionName;
	}
    /**
     * @param string|null $sessionName Session Name
     * @return CommitVoteRequest
     */
	public function withSessionName(?string $sessionName): CommitVoteRequest {
		$this->sessionName = $sessionName;
		return $this;
	}

    public static function fromJson(?array $data): ?CommitVoteRequest {
        if ($data === null) {
            return null;
        }
        return (new CommitVoteRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withSessionName(array_key_exists('sessionName', $data) && $data['sessionName'] !== null ? $data['sessionName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "seasonName" => $this->getSeasonName(),
            "sessionName" => $this->getSessionName(),
        );
    }
}
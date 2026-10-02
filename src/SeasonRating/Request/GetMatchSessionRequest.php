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
 * Request for getMatchSession: Get MatchSession
 *
 * @see https://docs.gs2.io/api_reference/season_rating/sdk/#getmatchsession
 */
class GetMatchSessionRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Session name */
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
     * @return GetMatchSessionRequest
     */
	public function withNamespaceName(?string $namespaceName): GetMatchSessionRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Session name */
	public function getSessionName(): ?string {
		return $this->sessionName;
	}
    /** @param string|null $sessionName Session name */
	public function setSessionName(?string $sessionName) {
		$this->sessionName = $sessionName;
	}
    /**
     * @param string|null $sessionName Session name
     * @return GetMatchSessionRequest
     */
	public function withSessionName(?string $sessionName): GetMatchSessionRequest {
		$this->sessionName = $sessionName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetMatchSessionRequest {
        if ($data === null) {
            return null;
        }
        return (new GetMatchSessionRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSessionName(array_key_exists('sessionName', $data) && $data['sessionName'] !== null ? $data['sessionName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "sessionName" => $this->getSessionName(),
        );
    }
}
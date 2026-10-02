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

namespace Gs2\Showcase\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getShowcaseByUserId: Get Showcase by User ID
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#getshowcasebyuserid
 */
class GetShowcaseByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Showcase name */
    private $showcaseName;
    /** @var string User ID */
    private $userId;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return GetShowcaseByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetShowcaseByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Showcase name */
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
    /** @param string|null $showcaseName Showcase name */
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
    /**
     * @param string|null $showcaseName Showcase name
     * @return GetShowcaseByUserIdRequest
     */
	public function withShowcaseName(?string $showcaseName): GetShowcaseByUserIdRequest {
		$this->showcaseName = $showcaseName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return GetShowcaseByUserIdRequest
     */
	public function withUserId(?string $userId): GetShowcaseByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return GetShowcaseByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetShowcaseByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetShowcaseByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetShowcaseByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withShowcaseName(array_key_exists('showcaseName', $data) && $data['showcaseName'] !== null ? $data['showcaseName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "showcaseName" => $this->getShowcaseName(),
            "userId" => $this->getUserId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}
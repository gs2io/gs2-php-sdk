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

namespace Gs2\Guild\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class SearchGuildsByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $guildModelName;
    /** @var string */
    private $userId;
    /** @var string */
    private $displayName;
    /** @var array */
    private $attributes1;
    /** @var array */
    private $attributes2;
    /** @var array */
    private $attributes3;
    /** @var array */
    private $attributes4;
    /** @var array */
    private $attributes5;
    /** @var array */
    private $joinPolicies;
    /** @var bool */
    private $includeFullMembersGuild;
    /** @var string */
    private $orderBy;
    /** @var string */
    private $pageToken;
    /** @var int */
    private $limit;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): SearchGuildsByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
	public function withGuildModelName(?string $guildModelName): SearchGuildsByUserIdRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): SearchGuildsByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
	public function withDisplayName(?string $displayName): SearchGuildsByUserIdRequest {
		$this->displayName = $displayName;
		return $this;
	}
	public function getAttributes1(): ?array {
		return $this->attributes1;
	}
	public function setAttributes1(?array $attributes1) {
		$this->attributes1 = $attributes1;
	}
	public function withAttributes1(?array $attributes1): SearchGuildsByUserIdRequest {
		$this->attributes1 = $attributes1;
		return $this;
	}
	public function getAttributes2(): ?array {
		return $this->attributes2;
	}
	public function setAttributes2(?array $attributes2) {
		$this->attributes2 = $attributes2;
	}
	public function withAttributes2(?array $attributes2): SearchGuildsByUserIdRequest {
		$this->attributes2 = $attributes2;
		return $this;
	}
	public function getAttributes3(): ?array {
		return $this->attributes3;
	}
	public function setAttributes3(?array $attributes3) {
		$this->attributes3 = $attributes3;
	}
	public function withAttributes3(?array $attributes3): SearchGuildsByUserIdRequest {
		$this->attributes3 = $attributes3;
		return $this;
	}
	public function getAttributes4(): ?array {
		return $this->attributes4;
	}
	public function setAttributes4(?array $attributes4) {
		$this->attributes4 = $attributes4;
	}
	public function withAttributes4(?array $attributes4): SearchGuildsByUserIdRequest {
		$this->attributes4 = $attributes4;
		return $this;
	}
	public function getAttributes5(): ?array {
		return $this->attributes5;
	}
	public function setAttributes5(?array $attributes5) {
		$this->attributes5 = $attributes5;
	}
	public function withAttributes5(?array $attributes5): SearchGuildsByUserIdRequest {
		$this->attributes5 = $attributes5;
		return $this;
	}
	public function getJoinPolicies(): ?array {
		return $this->joinPolicies;
	}
	public function setJoinPolicies(?array $joinPolicies) {
		$this->joinPolicies = $joinPolicies;
	}
	public function withJoinPolicies(?array $joinPolicies): SearchGuildsByUserIdRequest {
		$this->joinPolicies = $joinPolicies;
		return $this;
	}
	public function getIncludeFullMembersGuild(): ?bool {
		return $this->includeFullMembersGuild;
	}
	public function setIncludeFullMembersGuild(?bool $includeFullMembersGuild) {
		$this->includeFullMembersGuild = $includeFullMembersGuild;
	}
	public function withIncludeFullMembersGuild(?bool $includeFullMembersGuild): SearchGuildsByUserIdRequest {
		$this->includeFullMembersGuild = $includeFullMembersGuild;
		return $this;
	}
	public function getOrderBy(): ?string {
		return $this->orderBy;
	}
	public function setOrderBy(?string $orderBy) {
		$this->orderBy = $orderBy;
	}
	public function withOrderBy(?string $orderBy): SearchGuildsByUserIdRequest {
		$this->orderBy = $orderBy;
		return $this;
	}
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
	public function withPageToken(?string $pageToken): SearchGuildsByUserIdRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
	public function withLimit(?int $limit): SearchGuildsByUserIdRequest {
		$this->limit = $limit;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): SearchGuildsByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SearchGuildsByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SearchGuildsByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SearchGuildsByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDisplayName(array_key_exists('displayName', $data) && $data['displayName'] !== null ? $data['displayName'] : null)
            ->withAttributes1(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('attributes1', $data) && $data['attributes1'] !== null ? $data['attributes1'] : []
            ))
            ->withAttributes2(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('attributes2', $data) && $data['attributes2'] !== null ? $data['attributes2'] : []
            ))
            ->withAttributes3(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('attributes3', $data) && $data['attributes3'] !== null ? $data['attributes3'] : []
            ))
            ->withAttributes4(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('attributes4', $data) && $data['attributes4'] !== null ? $data['attributes4'] : []
            ))
            ->withAttributes5(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('attributes5', $data) && $data['attributes5'] !== null ? $data['attributes5'] : []
            ))
            ->withJoinPolicies(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('joinPolicies', $data) && $data['joinPolicies'] !== null ? $data['joinPolicies'] : []
            ))
            ->withIncludeFullMembersGuild(array_key_exists('includeFullMembersGuild', $data) ? $data['includeFullMembersGuild'] : null)
            ->withOrderBy(array_key_exists('orderBy', $data) && $data['orderBy'] !== null ? $data['orderBy'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildModelName" => $this->getGuildModelName(),
            "userId" => $this->getUserId(),
            "displayName" => $this->getDisplayName(),
            "attributes1" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAttributes1() !== null && $this->getAttributes1() !== null ? $this->getAttributes1() : []
            ),
            "attributes2" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAttributes2() !== null && $this->getAttributes2() !== null ? $this->getAttributes2() : []
            ),
            "attributes3" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAttributes3() !== null && $this->getAttributes3() !== null ? $this->getAttributes3() : []
            ),
            "attributes4" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAttributes4() !== null && $this->getAttributes4() !== null ? $this->getAttributes4() : []
            ),
            "attributes5" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAttributes5() !== null && $this->getAttributes5() !== null ? $this->getAttributes5() : []
            ),
            "joinPolicies" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getJoinPolicies() !== null && $this->getJoinPolicies() !== null ? $this->getJoinPolicies() : []
            ),
            "includeFullMembersGuild" => $this->getIncludeFullMembersGuild(),
            "orderBy" => $this->getOrderBy(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}
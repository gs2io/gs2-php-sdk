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

class SearchGuildsRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $guildModelName;
    /** @var string */
    private $accessToken;
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
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): SearchGuildsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
	public function withGuildModelName(?string $guildModelName): SearchGuildsRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): SearchGuildsRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
	public function withDisplayName(?string $displayName): SearchGuildsRequest {
		$this->displayName = $displayName;
		return $this;
	}
	public function getAttributes1(): ?array {
		return $this->attributes1;
	}
	public function setAttributes1(?array $attributes1) {
		$this->attributes1 = $attributes1;
	}
	public function withAttributes1(?array $attributes1): SearchGuildsRequest {
		$this->attributes1 = $attributes1;
		return $this;
	}
	public function getAttributes2(): ?array {
		return $this->attributes2;
	}
	public function setAttributes2(?array $attributes2) {
		$this->attributes2 = $attributes2;
	}
	public function withAttributes2(?array $attributes2): SearchGuildsRequest {
		$this->attributes2 = $attributes2;
		return $this;
	}
	public function getAttributes3(): ?array {
		return $this->attributes3;
	}
	public function setAttributes3(?array $attributes3) {
		$this->attributes3 = $attributes3;
	}
	public function withAttributes3(?array $attributes3): SearchGuildsRequest {
		$this->attributes3 = $attributes3;
		return $this;
	}
	public function getAttributes4(): ?array {
		return $this->attributes4;
	}
	public function setAttributes4(?array $attributes4) {
		$this->attributes4 = $attributes4;
	}
	public function withAttributes4(?array $attributes4): SearchGuildsRequest {
		$this->attributes4 = $attributes4;
		return $this;
	}
	public function getAttributes5(): ?array {
		return $this->attributes5;
	}
	public function setAttributes5(?array $attributes5) {
		$this->attributes5 = $attributes5;
	}
	public function withAttributes5(?array $attributes5): SearchGuildsRequest {
		$this->attributes5 = $attributes5;
		return $this;
	}
	public function getJoinPolicies(): ?array {
		return $this->joinPolicies;
	}
	public function setJoinPolicies(?array $joinPolicies) {
		$this->joinPolicies = $joinPolicies;
	}
	public function withJoinPolicies(?array $joinPolicies): SearchGuildsRequest {
		$this->joinPolicies = $joinPolicies;
		return $this;
	}
	public function getIncludeFullMembersGuild(): ?bool {
		return $this->includeFullMembersGuild;
	}
	public function setIncludeFullMembersGuild(?bool $includeFullMembersGuild) {
		$this->includeFullMembersGuild = $includeFullMembersGuild;
	}
	public function withIncludeFullMembersGuild(?bool $includeFullMembersGuild): SearchGuildsRequest {
		$this->includeFullMembersGuild = $includeFullMembersGuild;
		return $this;
	}
	public function getOrderBy(): ?string {
		return $this->orderBy;
	}
	public function setOrderBy(?string $orderBy) {
		$this->orderBy = $orderBy;
	}
	public function withOrderBy(?string $orderBy): SearchGuildsRequest {
		$this->orderBy = $orderBy;
		return $this;
	}
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
	public function withPageToken(?string $pageToken): SearchGuildsRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
	public function withLimit(?int $limit): SearchGuildsRequest {
		$this->limit = $limit;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SearchGuildsRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SearchGuildsRequest {
        if ($data === null) {
            return null;
        }
        return (new SearchGuildsRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withDisplayName(array_key_exists('displayName', $data) && $data['displayName'] !== null ? $data['displayName'] : null)
            ->withAttributes1(!array_key_exists('attributes1', $data) || $data['attributes1'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['attributes1']
            ))
            ->withAttributes2(!array_key_exists('attributes2', $data) || $data['attributes2'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['attributes2']
            ))
            ->withAttributes3(!array_key_exists('attributes3', $data) || $data['attributes3'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['attributes3']
            ))
            ->withAttributes4(!array_key_exists('attributes4', $data) || $data['attributes4'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['attributes4']
            ))
            ->withAttributes5(!array_key_exists('attributes5', $data) || $data['attributes5'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['attributes5']
            ))
            ->withJoinPolicies(!array_key_exists('joinPolicies', $data) || $data['joinPolicies'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['joinPolicies']
            ))
            ->withIncludeFullMembersGuild(array_key_exists('includeFullMembersGuild', $data) ? $data['includeFullMembersGuild'] : null)
            ->withOrderBy(array_key_exists('orderBy', $data) && $data['orderBy'] !== null ? $data['orderBy'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildModelName" => $this->getGuildModelName(),
            "accessToken" => $this->getAccessToken(),
            "displayName" => $this->getDisplayName(),
            "attributes1" => $this->getAttributes1() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAttributes1()
            ),
            "attributes2" => $this->getAttributes2() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAttributes2()
            ),
            "attributes3" => $this->getAttributes3() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAttributes3()
            ),
            "attributes4" => $this->getAttributes4() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAttributes4()
            ),
            "attributes5" => $this->getAttributes5() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAttributes5()
            ),
            "joinPolicies" => $this->getJoinPolicies() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getJoinPolicies()
            ),
            "includeFullMembersGuild" => $this->getIncludeFullMembersGuild(),
            "orderBy" => $this->getOrderBy(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}
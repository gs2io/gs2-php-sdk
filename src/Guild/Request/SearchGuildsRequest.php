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

/**
 * Request for searchGuilds: Search Guilds
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#searchguilds
 */
class SearchGuildsRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Display name to search for guild */
    private $displayName;
    /** @var array List of guild operation policies to search for guild */
    private $attributes1;
    /** @var array List of guild operation policies to search for guild */
    private $attributes2;
    /** @var array List of guild operation policies to search for guild */
    private $attributes3;
    /** @var array List of guild operation policies to search for guild */
    private $attributes4;
    /** @var array List of guild operation policies to search for guild */
    private $attributes5;
    /** @var array List of guild join policies to search for guild */
    private $joinPolicies;
    /** @var bool Whether to include full guilds in search results */
    private $includeFullMembersGuild;
    /** @var string Sort order */
    private $orderBy;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data items to retrieve */
    private $limit;
    /** @var string */
    private $duplicationAvoider;
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
     * @return SearchGuildsRequest
     */
	public function withNamespaceName(?string $namespaceName): SearchGuildsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Guild Model name */
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
    /** @param string|null $guildModelName Guild Model name */
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
    /**
     * @param string|null $guildModelName Guild Model name
     * @return SearchGuildsRequest
     */
	public function withGuildModelName(?string $guildModelName): SearchGuildsRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return SearchGuildsRequest
     */
	public function withAccessToken(?string $accessToken): SearchGuildsRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Display name to search for guild */
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
    /** @param string|null $displayName Display name to search for guild */
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
    /**
     * @param string|null $displayName Display name to search for guild
     * @return SearchGuildsRequest
     */
	public function withDisplayName(?string $displayName): SearchGuildsRequest {
		$this->displayName = $displayName;
		return $this;
	}
    /** @return array|null List of guild operation policies to search for guild */
	public function getAttributes1(): ?array {
		return $this->attributes1;
	}
    /** @param array|null $attributes1 List of guild operation policies to search for guild */
	public function setAttributes1(?array $attributes1) {
		$this->attributes1 = $attributes1;
	}
    /**
     * @param array|null $attributes1 List of guild operation policies to search for guild
     * @return SearchGuildsRequest
     */
	public function withAttributes1(?array $attributes1): SearchGuildsRequest {
		$this->attributes1 = $attributes1;
		return $this;
	}
    /** @return array|null List of guild operation policies to search for guild */
	public function getAttributes2(): ?array {
		return $this->attributes2;
	}
    /** @param array|null $attributes2 List of guild operation policies to search for guild */
	public function setAttributes2(?array $attributes2) {
		$this->attributes2 = $attributes2;
	}
    /**
     * @param array|null $attributes2 List of guild operation policies to search for guild
     * @return SearchGuildsRequest
     */
	public function withAttributes2(?array $attributes2): SearchGuildsRequest {
		$this->attributes2 = $attributes2;
		return $this;
	}
    /** @return array|null List of guild operation policies to search for guild */
	public function getAttributes3(): ?array {
		return $this->attributes3;
	}
    /** @param array|null $attributes3 List of guild operation policies to search for guild */
	public function setAttributes3(?array $attributes3) {
		$this->attributes3 = $attributes3;
	}
    /**
     * @param array|null $attributes3 List of guild operation policies to search for guild
     * @return SearchGuildsRequest
     */
	public function withAttributes3(?array $attributes3): SearchGuildsRequest {
		$this->attributes3 = $attributes3;
		return $this;
	}
    /** @return array|null List of guild operation policies to search for guild */
	public function getAttributes4(): ?array {
		return $this->attributes4;
	}
    /** @param array|null $attributes4 List of guild operation policies to search for guild */
	public function setAttributes4(?array $attributes4) {
		$this->attributes4 = $attributes4;
	}
    /**
     * @param array|null $attributes4 List of guild operation policies to search for guild
     * @return SearchGuildsRequest
     */
	public function withAttributes4(?array $attributes4): SearchGuildsRequest {
		$this->attributes4 = $attributes4;
		return $this;
	}
    /** @return array|null List of guild operation policies to search for guild */
	public function getAttributes5(): ?array {
		return $this->attributes5;
	}
    /** @param array|null $attributes5 List of guild operation policies to search for guild */
	public function setAttributes5(?array $attributes5) {
		$this->attributes5 = $attributes5;
	}
    /**
     * @param array|null $attributes5 List of guild operation policies to search for guild
     * @return SearchGuildsRequest
     */
	public function withAttributes5(?array $attributes5): SearchGuildsRequest {
		$this->attributes5 = $attributes5;
		return $this;
	}
    /** @return array|null List of guild join policies to search for guild */
	public function getJoinPolicies(): ?array {
		return $this->joinPolicies;
	}
    /** @param array|null $joinPolicies List of guild join policies to search for guild */
	public function setJoinPolicies(?array $joinPolicies) {
		$this->joinPolicies = $joinPolicies;
	}
    /**
     * @param array|null $joinPolicies List of guild join policies to search for guild
     * @return SearchGuildsRequest
     */
	public function withJoinPolicies(?array $joinPolicies): SearchGuildsRequest {
		$this->joinPolicies = $joinPolicies;
		return $this;
	}
    /** @return bool|null Whether to include full guilds in search results */
	public function getIncludeFullMembersGuild(): ?bool {
		return $this->includeFullMembersGuild;
	}
    /** @param bool|null $includeFullMembersGuild Whether to include full guilds in search results */
	public function setIncludeFullMembersGuild(?bool $includeFullMembersGuild) {
		$this->includeFullMembersGuild = $includeFullMembersGuild;
	}
    /**
     * @param bool|null $includeFullMembersGuild Whether to include full guilds in search results
     * @return SearchGuildsRequest
     */
	public function withIncludeFullMembersGuild(?bool $includeFullMembersGuild): SearchGuildsRequest {
		$this->includeFullMembersGuild = $includeFullMembersGuild;
		return $this;
	}
    /** @return string|null Sort order */
	public function getOrderBy(): ?string {
		return $this->orderBy;
	}
    /** @param string|null $orderBy Sort order */
	public function setOrderBy(?string $orderBy) {
		$this->orderBy = $orderBy;
	}
    /**
     * @param string|null $orderBy Sort order
     * @return SearchGuildsRequest
     */
	public function withOrderBy(?string $orderBy): SearchGuildsRequest {
		$this->orderBy = $orderBy;
		return $this;
	}
    /** @return string|null Token specifying the position from which to start acquiring data */
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
    /** @param string|null $pageToken Token specifying the position from which to start acquiring data */
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
    /**
     * @param string|null $pageToken Token specifying the position from which to start acquiring data
     * @return SearchGuildsRequest
     */
	public function withPageToken(?string $pageToken): SearchGuildsRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
    /** @return int|null Number of data items to retrieve */
	public function getLimit(): ?int {
		return $this->limit;
	}
    /** @param int|null $limit Number of data items to retrieve */
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
    /**
     * @param int|null $limit Number of data items to retrieve
     * @return SearchGuildsRequest
     */
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
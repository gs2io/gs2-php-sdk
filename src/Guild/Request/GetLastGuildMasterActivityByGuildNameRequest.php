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

class GetLastGuildMasterActivityByGuildNameRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $guildModelName;
    /** @var string */
    private $guildName;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetLastGuildMasterActivityByGuildNameRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
	public function withGuildModelName(?string $guildModelName): GetLastGuildMasterActivityByGuildNameRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
	public function getGuildName(): ?string {
		return $this->guildName;
	}
	public function setGuildName(?string $guildName) {
		$this->guildName = $guildName;
	}
	public function withGuildName(?string $guildName): GetLastGuildMasterActivityByGuildNameRequest {
		$this->guildName = $guildName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetLastGuildMasterActivityByGuildNameRequest {
        if ($data === null) {
            return null;
        }
        return (new GetLastGuildMasterActivityByGuildNameRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withGuildName(array_key_exists('guildName', $data) && $data['guildName'] !== null ? $data['guildName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildModelName" => $this->getGuildModelName(),
            "guildName" => $this->getGuildName(),
        );
    }
}
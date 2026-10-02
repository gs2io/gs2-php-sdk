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

namespace Gs2\Version\Model;

use Gs2\Core\Model\IModel;


/**
 * Version
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#version
 */
class Version implements IModel {
	/**
     * @var int Major version
	 */
	private $major;
	/**
     * @var int Minor version
	 */
	private $minor;
	/**
     * @var int Micro version
	 */
	private $micro;
    /** @return int|null Major version */
	public function getMajor(): ?int {
		return $this->major;
	}
    /** @param int|null $major Major version */
	public function setMajor(?int $major) {
		$this->major = $major;
	}
    /**
     * @param int|null $major Major version
     * @return Version
     */
	public function withMajor(?int $major): Version {
		$this->major = $major;
		return $this;
	}
    /** @return int|null Minor version */
	public function getMinor(): ?int {
		return $this->minor;
	}
    /** @param int|null $minor Minor version */
	public function setMinor(?int $minor) {
		$this->minor = $minor;
	}
    /**
     * @param int|null $minor Minor version
     * @return Version
     */
	public function withMinor(?int $minor): Version {
		$this->minor = $minor;
		return $this;
	}
    /** @return int|null Micro version */
	public function getMicro(): ?int {
		return $this->micro;
	}
    /** @param int|null $micro Micro version */
	public function setMicro(?int $micro) {
		$this->micro = $micro;
	}
    /**
     * @param int|null $micro Micro version
     * @return Version
     */
	public function withMicro(?int $micro): Version {
		$this->micro = $micro;
		return $this;
	}

    public static function fromJson(?array $data): ?Version {
        if ($data === null) {
            return null;
        }
        return (new Version())
            ->withMajor(array_key_exists('major', $data) && $data['major'] !== null ? $data['major'] : null)
            ->withMinor(array_key_exists('minor', $data) && $data['minor'] !== null ? $data['minor'] : null)
            ->withMicro(array_key_exists('micro', $data) && $data['micro'] !== null ? $data['micro'] : null);
    }

    public function toJson(): array {
        return array(
            "major" => $this->getMajor(),
            "minor" => $this->getMinor(),
            "micro" => $this->getMicro(),
        );
    }
}
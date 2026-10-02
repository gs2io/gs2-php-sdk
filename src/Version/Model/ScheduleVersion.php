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
 * Version that switches in chronological order
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#scheduleversion
 */
class ScheduleVersion implements IModel {
	/**
     * @var Version Current Version
	 */
	private $currentVersion;
	/**
     * @var Version Version that prompts for version upgrade
	 */
	private $warningVersion;
	/**
     * @var Version Version that is determined to be an error by the version check
	 */
	private $errorVersion;
	/**
     * @var string GS2-Schedule event GRN that enables version check
	 */
	private $scheduleEventId;
    /** @return Version|null Current Version */
	public function getCurrentVersion(): ?Version {
		return $this->currentVersion;
	}
    /** @param Version|null $currentVersion Current Version */
	public function setCurrentVersion(?Version $currentVersion) {
		$this->currentVersion = $currentVersion;
	}
    /**
     * @param Version|null $currentVersion Current Version
     * @return ScheduleVersion
     */
	public function withCurrentVersion(?Version $currentVersion): ScheduleVersion {
		$this->currentVersion = $currentVersion;
		return $this;
	}
    /** @return Version|null Version that prompts for version upgrade */
	public function getWarningVersion(): ?Version {
		return $this->warningVersion;
	}
    /** @param Version|null $warningVersion Version that prompts for version upgrade */
	public function setWarningVersion(?Version $warningVersion) {
		$this->warningVersion = $warningVersion;
	}
    /**
     * @param Version|null $warningVersion Version that prompts for version upgrade
     * @return ScheduleVersion
     */
	public function withWarningVersion(?Version $warningVersion): ScheduleVersion {
		$this->warningVersion = $warningVersion;
		return $this;
	}
    /** @return Version|null Version that is determined to be an error by the version check */
	public function getErrorVersion(): ?Version {
		return $this->errorVersion;
	}
    /** @param Version|null $errorVersion Version that is determined to be an error by the version check */
	public function setErrorVersion(?Version $errorVersion) {
		$this->errorVersion = $errorVersion;
	}
    /**
     * @param Version|null $errorVersion Version that is determined to be an error by the version check
     * @return ScheduleVersion
     */
	public function withErrorVersion(?Version $errorVersion): ScheduleVersion {
		$this->errorVersion = $errorVersion;
		return $this;
	}
    /** @return string|null GS2-Schedule event GRN that enables version check */
	public function getScheduleEventId(): ?string {
		return $this->scheduleEventId;
	}
    /** @param string|null $scheduleEventId GS2-Schedule event GRN that enables version check */
	public function setScheduleEventId(?string $scheduleEventId) {
		$this->scheduleEventId = $scheduleEventId;
	}
    /**
     * @param string|null $scheduleEventId GS2-Schedule event GRN that enables version check
     * @return ScheduleVersion
     */
	public function withScheduleEventId(?string $scheduleEventId): ScheduleVersion {
		$this->scheduleEventId = $scheduleEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?ScheduleVersion {
        if ($data === null) {
            return null;
        }
        return (new ScheduleVersion())
            ->withCurrentVersion(array_key_exists('currentVersion', $data) && $data['currentVersion'] !== null ? Version::fromJson($data['currentVersion']) : null)
            ->withWarningVersion(array_key_exists('warningVersion', $data) && $data['warningVersion'] !== null ? Version::fromJson($data['warningVersion']) : null)
            ->withErrorVersion(array_key_exists('errorVersion', $data) && $data['errorVersion'] !== null ? Version::fromJson($data['errorVersion']) : null)
            ->withScheduleEventId(array_key_exists('scheduleEventId', $data) && $data['scheduleEventId'] !== null ? $data['scheduleEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "currentVersion" => $this->getCurrentVersion() !== null ? $this->getCurrentVersion()->toJson() : null,
            "warningVersion" => $this->getWarningVersion() !== null ? $this->getWarningVersion()->toJson() : null,
            "errorVersion" => $this->getErrorVersion() !== null ? $this->getErrorVersion()->toJson() : null,
            "scheduleEventId" => $this->getScheduleEventId(),
        );
    }
}